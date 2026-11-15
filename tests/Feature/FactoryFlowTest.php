<?php

use App\Filament\Admin\Resources\BuyerResource\Pages\ListBuyer;
use App\Models\Bom;
use App\Models\BundleScan;
use App\Models\Buyer;
use App\Models\BuyerOrder;
use App\Models\Capa;
use App\Models\Company;
use App\Models\Costing;
use App\Models\CostingLine;
use App\Models\GoodsReceipt;
use App\Models\GoodsReceiptLine;
use App\Models\Inquiry;
use App\Models\IssueType;
use App\Models\Item;
use App\Models\LetterOfCredit;
use App\Models\MaterialRequirement;
use App\Models\Playbook;
use App\Models\PlaybookStep;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderLine;
use App\Models\Role;
use App\Models\Store;
use App\Models\Style;
use App\Models\SupplierInvoice;
use App\Models\TnaMilestone;
use App\Models\Unit;
use App\Models\User;
use App\Services\Commercial\LcService;
use App\Services\Inventory\StockService;
use App\Services\Issues\IssueEngine;
use App\Services\Numbering\NumberingService;
use App\Services\Procurement\ThreeWayMatchService;
use App\Services\Workflow\WorkflowService;
use Filament\Facades\Filament;
use Laravel\Sanctum\Sanctum;
use Livewire\Livewire;

function factoryUnit(): Unit
{
    $company = Company::query()->create(['name' => 'Padma', 'code' => 'PADMA']);

    return Unit::query()->create(['name' => 'Unit 1', 'code' => 'U1', 'kind' => 'sewing', 'company_id' => $company->id]);
}

it('confirms an order into a bom, requirement and tna', function () {
    $unit = factoryUnit();
    $buyer = Buyer::query()->create(['name' => 'Northwind', 'code' => 'NW', 'unit_id' => $unit->id]);
    $style = Style::query()->create(['name' => 'Tee', 'code' => 'ST001', 'smv' => 8.5, 'status' => 'approved', 'unit_id' => $unit->id, 'buyer_id' => $buyer->id]);
    $item = Item::query()->create(['name' => 'Jersey', 'code' => 'FAB', 'unit_id' => $unit->id]);
    $costing = Costing::query()->create([
        'name' => 'Cost', 'style_id' => $style->id, 'unit_id' => $unit->id, 'version' => 1, 'status' => 'approved',
        'currency' => 'USD', 'exchange_rate' => 122, 'smv' => 8.5, 'efficiency' => 0.65, 'fob_minor' => 195,
    ]);
    CostingLine::query()->create([
        'name' => 'Body', 'costing_id' => $costing->id, 'item_id' => $item->id, 'qty' => 0.22, 'wastage_percent' => 5, 'unit_cost_minor' => 350, 'amount_minor' => 81,
    ]);
    $order = BuyerOrder::query()->create([
        'name' => 'Hero', 'buyer_id' => $buyer->id, 'style_id' => $style->id, 'costing_id' => $costing->id,
        'unit_id' => $unit->id, 'qty' => 10000, 'fob_minor' => 195, 'ship_on' => '2026-12-20', 'status' => 'draft', 'currency' => 'USD',
    ]);

    app(WorkflowService::class)->transition($order, 'confirmed');

    expect(Bom::query()->where('buyer_order_id', $order->id)->exists())->toBeTrue()
        ->and(MaterialRequirement::query()->where('buyer_order_id', $order->id)->value('required_qty'))->toBe('2310.0000')
        ->and(TnaMilestone::query()->where('buyer_order_id', $order->id)->count())->toBeGreaterThan(0)
        ->and($order->fresh()->po_number)->toStartWith('PO-U1-');
});

it('issues stock by fifo and refuses a short issue', function () {
    $unit = factoryUnit();
    $store = Store::query()->create(['name' => 'Store', 'code' => 'S1', 'unit_id' => $unit->id]);
    $item = Item::query()->create(['name' => 'Jersey', 'code' => 'FAB2', 'unit_id' => $unit->id]);
    $stock = app(StockService::class);
    $stock->receive($store->id, $item->id, '10', 100, null, $unit->id);
    $stock->receive($store->id, $item->id, '5', 200, null, $unit->id);
    $stock->issue($store->id, $item->id, '12', null, $unit->id);

    expect($stock->onHandValue($store->id, $item->id))->toBe(600);
    expect(fn () => $stock->issue($store->id, $item->id, '4', null, $unit->id))->toThrow(RuntimeException::class);
});

it('opens playbook tasks, escalates a breached sla and raises a capa on the third repeat', function () {
    $unit = factoryUnit();
    $type = IssueType::query()->create(['name' => 'Trim shortage', 'code' => 'trim_shortage', 'severity_default' => 'high', 'sla_hours' => 24]);
    $playbook = Playbook::query()->create(['name' => 'Playbook', 'issue_type_id' => $type->id]);
    PlaybookStep::query()->create(['name' => 'Check store', 'playbook_id' => $playbook->id, 'sort_order' => 1, 'instructions' => 'Look next door']);
    $engine = app(IssueEngine::class);
    $first = $engine->raise(['name' => 'Short 1', 'issue_type_id' => $type->id, 'root_cause' => 'Material', 'unit_id' => $unit->id]);
    expect($first->tasks()->count())->toBe(1);

    $first->sla_due_at = now()->subHour();
    $first->save();
    expect($engine->escalate())->toBe(1);

    $engine->raise(['name' => 'Short 2', 'issue_type_id' => $type->id, 'root_cause' => 'Material', 'unit_id' => $unit->id]);
    $engine->raise(['name' => 'Short 3', 'issue_type_id' => $type->id, 'root_cause' => 'Material', 'unit_id' => $unit->id]);
    expect(Capa::query()->where('root_cause', 'Material')->exists())->toBeTrue();
});

it('numbers documents without a gap and blocks an overdrawn lc', function () {
    $unit = factoryUnit();
    $numbers = app(NumberingService::class);
    $first = $numbers->next('purchase_order', $unit->id, 'PO');
    $second = $numbers->next('purchase_order', $unit->id, 'PO');
    expect($first)->toMatch('/PO-U1-\d{4}-000001/')
        ->and($second)->toMatch('/000002$/');

    $lc = LetterOfCredit::query()->create([
        'name' => 'LC', 'lc_type' => 'master', 'lc_number' => 'LC1', 'amount_minor' => 1000, 'utilized_minor' => 800, 'status' => 'opened', 'unit_id' => $unit->id, 'currency' => 'USD',
    ]);
    app(LcService::class)->utilize($lc, 100);
    expect((int) $lc->fresh()->utilized_minor)->toBe(900);
    expect(fn () => app(LcService::class)->utilize($lc->fresh(), 200))->toThrow(RuntimeException::class);
});

it('matches a supplier invoice to the po and the grn', function () {
    $unit = factoryUnit();
    $po = PurchaseOrder::query()->create(['name' => 'PO', 'status' => 'received', 'currency' => 'USD', 'total_minor' => 1000, 'unit_id' => $unit->id]);
    PurchaseOrderLine::query()->create(['name' => 'Line', 'purchase_order_id' => $po->id, 'qty' => 10, 'price_minor' => 100, 'received_qty' => 10]);
    $grn = GoodsReceipt::query()->create(['name' => 'GRN', 'purchase_order_id' => $po->id, 'status' => 'posted', 'unit_id' => $unit->id]);
    GoodsReceiptLine::query()->create(['name' => 'Line', 'goods_receipt_id' => $grn->id, 'qty' => 10, 'accepted_qty' => 10, 'rejected_qty' => 0, 'unit_cost_minor' => 100]);
    $invoice = SupplierInvoice::query()->create(['name' => 'Bill', 'purchase_order_id' => $po->id, 'goods_receipt_id' => $grn->id, 'amount_minor' => 1000, 'currency' => 'USD', 'status' => 'received', 'unit_id' => $unit->id]);

    expect(app(ThreeWayMatchService::class)->match($po, $grn, $invoice))->toBe('matched');
});

it('accepts one scan for an idempotency key and rejects a bad webhook signature', function () {
    $user = User::factory()->create(['is_active' => true, 'portal' => 'floor']);
    Sanctum::actingAs($user);

    $this->withHeader('Idempotency-Key', 'scan-1')->postJson('/api/v1/scans', ['barcode' => 'BND-1', 'direction' => 'in', 'qty' => 20])->assertCreated();
    $this->withHeader('Idempotency-Key', 'scan-1')->postJson('/api/v1/scans', ['barcode' => 'BND-1', 'direction' => 'in', 'qty' => 20])->assertOk();
    expect(BundleScan::query()->count())->toBe(1);

    $this->postJson('/api/v1/webhooks', ['hello' => 'padma'], ['X-Signature' => 'nope'])->assertUnauthorized();
    $body = json_encode(['hello' => 'padma']);
    $signature = hash_hmac('sha256', (string) $body, (string) config('garment.webhook_secret'));
    $this->call('POST', '/api/v1/webhooks', [], [], [], ['HTTP_X-Signature' => $signature, 'CONTENT_TYPE' => 'application/json'], (string) $body)->assertOk();
});

it('turns a website quote request into an inquiry', function () {
    $this->get('/')->assertOk();
    $this->post('/rfq', [
        'company_name' => 'Northwind',
        'email' => 'buyer@northwind.test',
        'product_type' => 'Basic tee',
        'qty' => 5000,
        'notes' => 'Black, S-XL',
    ])->assertRedirect();

    expect(Inquiry::query()->where('email', 'buyer@northwind.test')->value('status'))->toBe('new');
});

it('lets a super admin open the buyer list', function () {
    $unit = factoryUnit();
    $role = Role::query()->create(['name' => 'Super', 'slug' => 'super-admin', 'panels' => ['admin'], 'requires_2fa' => false]);
    $user = User::factory()->create(['is_active' => true, 'portal' => 'admin', 'current_unit_id' => $unit->id]);
    $user->roles()->sync([$role->id]);
    $this->actingAs($user);

    Filament::setCurrentPanel(Filament::getPanel('admin'));
    Livewire::test(ListBuyer::class)->assertOk();
});
