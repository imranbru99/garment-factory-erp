<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Bom;
use App\Models\Bundle;
use App\Models\Buyer;
use App\Models\BuyerOrder;
use App\Models\BuyingHouse;
use App\Models\Carton;
use App\Models\CaseStudy;
use App\Models\Certificate;
use App\Models\CmsPage;
use App\Models\Color;
use App\Models\CommercialInvoice;
use App\Models\Company;
use App\Models\Costing;
use App\Models\CostingLine;
use App\Models\Currency;
use App\Models\CutPlan;
use App\Models\Defect;
use App\Models\Department;
use App\Models\Designation;
use App\Models\DownloadItem;
use App\Models\Employee;
use App\Models\EsgRecord;
use App\Models\ExchangeRate;
use App\Models\FabricRoll;
use App\Models\Faq;
use App\Models\FiscalYear;
use App\Models\Floor;
use App\Models\GarmentModel;
use App\Models\GoodsReceipt;
use App\Models\GoodsReceiptLine;
use App\Models\Holiday;
use App\Models\Inquiry;
use App\Models\IssueType;
use App\Models\Item;
use App\Models\ItemGroup;
use App\Models\JobPost;
use App\Models\JournalEntry;
use App\Models\JournalLine;
use App\Models\LedgerAccount;
use App\Models\LetterOfCredit;
use App\Models\Line;
use App\Models\ModuleSetting;
use App\Models\NewsPost;
use App\Models\PayrollPeriod;
use App\Models\Permission;
use App\Models\Playbook;
use App\Models\PlaybookStep;
use App\Models\ProductCategory;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderLine;
use App\Models\QcDefect;
use App\Models\QcInspection;
use App\Models\Quotation;
use App\Models\Realization;
use App\Models\Role;
use App\Models\SampleRequest;
use App\Models\Shift;
use App\Models\Shipment;
use App\Models\Size;
use App\Models\Store;
use App\Models\Style;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\UnitOfMeasure;
use App\Models\User;
use App\Models\UtilizationDeclaration;
use App\Services\Inventory\StockService;
use App\Services\Issues\IssueEngine;
use App\Services\Payroll\PayrollService;
use App\Services\Quality\AqlService;
use App\Services\Sewing\EfficiencyService;
use App\Services\Workflow\WorkflowService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FactoryDemoSeeder extends Seeder
{
    public function run(): void
    {
        config(['queue.default' => 'sync']);
        GarmentModel::$auditing = false;
        $password = 'Password@123';

        $company = Company::query()->create([
            'name' => 'Padma Apparel Group',
            'name_bn' => 'পদ্মা অ্যাপারেল গ্রুপ',
            'code' => 'PADMA',
            'address' => 'Tongi, Gazipur, Bangladesh',
            'phone' => '+8801700000000',
            'email' => 'hello@padma.test',
            'website' => 'https://padma.test',
        ]);

        $sewing = $this->unit($company, 'U1', 'Unit 1 Sewing', 'sewing');
        $wash = $this->unit($company, 'U2', 'Unit 2 Washing', 'wash');
        $embroidery = $this->unit($company, 'U3', 'Unit 3 Embroidery', 'embroidery');
        $floor = Floor::query()->create(['name' => 'Sewing floor A', 'name_bn' => 'সেলাই ফ্লোর এ', 'unit_id' => $sewing->id, 'code' => 'F1']);
        Floor::query()->create(['name' => 'Wash floor', 'unit_id' => $wash->id, 'code' => 'FW']);
        Floor::query()->create(['name' => 'Embroidery floor', 'unit_id' => $embroidery->id, 'code' => 'FE']);

        $lines = [];
        for ($i = 1; $i <= 10; $i++) {
            $lines[] = Line::query()->create([
                'name' => 'Line '.str_pad((string) $i, 2, '0', STR_PAD_LEFT),
                'name_bn' => 'লাইন '.$i,
                'unit_id' => $sewing->id,
                'floor_id' => $floor->id,
                'code' => 'L'.str_pad((string) $i, 2, '0', STR_PAD_LEFT),
                'operators' => 25,
                'helpers' => 6,
                'smv_capacity' => 8.5,
            ]);
        }

        $modules = ['foundation', 'master', 'marketing', 'style', 'sampling', 'orders', 'commercial', 'procurement', 'inventory', 'lab', 'planning', 'cutting', 'embroidery', 'sewing', 'quality', 'wash', 'finishing', 'shipping', 'maintenance', 'hr', 'compliance', 'accounts', 'issues', 'communication', 'website'];
        foreach ($modules as $module) {
            ModuleSetting::query()->create(['name' => $module, 'module_key' => $module, 'enabled' => true, 'description' => $module.' module']);
        }

        $departments = [];
        foreach (['Merchandising', 'Cutting', 'Sewing', 'Quality', 'Wash', 'Finishing', 'Store', 'HR', 'Accounts', 'Maintenance', 'Commercial', 'Compliance', 'Security'] as $name) {
            $departments[$name] = Department::query()->create(['name' => $name, 'name_bn' => $name, 'code' => Str::upper(Str::substr($name, 0, 3)), 'unit_id' => $sewing->id]);
        }
        $operator = Designation::query()->create(['name' => 'Operator', 'name_bn' => 'অপারেটর', 'grade' => '5', 'category' => 'worker']);
        Designation::query()->create(['name' => 'Supervisor', 'name_bn' => 'সুপারভাইজার', 'grade' => '3', 'category' => 'staff']);
        Shift::query()->create(['name' => 'General', 'name_bn' => 'সাধারণ', 'unit_id' => $sewing->id, 'starts_at' => '08:00', 'ends_at' => '17:00', 'break_minutes' => 60, 'grace_minutes' => 10]);

        foreach ([['2026-02-21', 'Language Day'], ['2026-03-26', 'Independence Day'], ['2026-04-14', 'Pohela Boishakh'], ['2026-12-16', 'Victory Day']] as [$date, $name]) {
            Holiday::query()->create(['name' => $name, 'holiday_on' => $date, 'kind' => 'national', 'unit_id' => $sewing->id]);
        }

        FiscalYear::query()->create(['name' => 'FY 2026-27', 'code' => '2627', 'starts_on' => '2026-07-01', 'ends_on' => '2027-06-30', 'is_open' => true]);
        $bdt = Currency::query()->create(['name' => 'Taka', 'code' => 'BDT', 'symbol' => '৳', 'is_base' => true]);
        foreach (['USD', 'EUR', 'GBP'] as $code) {
            $currency = Currency::query()->create(['name' => $code, 'code' => $code, 'symbol' => $code, 'is_base' => false]);
            ExchangeRate::query()->create(['name' => $code.' rate', 'currency_id' => $currency->id, 'rate' => $code === 'USD' ? 122 : 130, 'effective_on' => '2026-11-01']);
        }
        ExchangeRate::query()->create(['name' => 'BDT rate', 'currency_id' => $bdt->id, 'rate' => 1, 'effective_on' => '2026-11-01']);

        $users = $this->users($password, $sewing, $modules);
        $buyerUser = $users['buyer'];
        $supplierUser = $users['supplier'];

        $house = BuyingHouse::query()->create(['name' => 'Dhaka Sourcing', 'name_bn' => 'ঢাকা সোর্সিং', 'email' => 'desk@dhaka-sourcing.test', 'unit_id' => $sewing->id]);
        $buyers = [
            Buyer::query()->create(['name' => 'Northwind Apparel', 'name_bn' => 'নর্থউইন্ড', 'code' => 'NW', 'email' => 'buying@northwind.test', 'unit_id' => $sewing->id, 'buying_house_id' => $house->id, 'payment_behavior' => 'on_time', 'rating' => 4.5]),
            Buyer::query()->create(['name' => 'Baltic Fashion', 'name_bn' => 'বাল্টিক', 'code' => 'BF', 'email' => 'orders@baltic.test', 'unit_id' => $sewing->id, 'rating' => 4.0]),
            Buyer::query()->create(['name' => 'Maple Street', 'name_bn' => 'ম্যাপেল', 'code' => 'MS', 'email' => 'po@maple.test', 'unit_id' => $sewing->id, 'rating' => 3.5]),
        ];
        $buyerUser->buyer_id = $buyers[0]->id;
        $buyerUser->save();

        $suppliers = [];
        for ($i = 1; $i <= 25; $i++) {
            $suppliers[] = Supplier::query()->create([
                'name' => 'Supplier '.$i,
                'name_bn' => 'সরবরাহকারী '.$i,
                'code' => 'S'.str_pad((string) $i, 3, '0', STR_PAD_LEFT),
                'category' => ['fabric', 'trims', 'packing', 'chemical', 'service'][$i % 5],
                'email' => "supplier{$i}@mill.test",
                'lead_days' => 7 + ($i % 14),
                'rating' => 3 + ($i % 3),
                'unit_id' => $sewing->id,
            ]);
        }
        $supplierUser->supplier_id = $suppliers[0]->id;
        $supplierUser->save();

        $uom = UnitOfMeasure::query()->create(['name' => 'Kilogram', 'code' => 'KG', 'dimension' => 'weight']);
        $group = ItemGroup::query()->create(['name' => 'Fabric', 'code' => 'FAB', 'category' => 'fabric']);
        $fabric = Item::query()->create([
            'name' => 'Single jersey 160 GSM',
            'name_bn' => 'সিঙ্গেল জার্সি',
            'code' => 'FAB-160',
            'item_group_id' => $group->id,
            'uom_id' => $uom->id,
            'category' => 'fabric',
            'reorder_level' => 100,
            'standard_cost_minor' => 350,
            'currency' => 'USD',
            'unit_id' => $sewing->id,
        ]);
        Item::query()->create(['name' => 'Main label', 'code' => 'TRM-LBL', 'category' => 'trims', 'reorder_level' => 5000, 'standard_cost_minor' => 2, 'currency' => 'USD', 'unit_id' => $sewing->id]);
        $colors = [
            Color::query()->create(['name' => 'Black', 'code' => 'BLK', 'pantone' => '19-4008']),
            Color::query()->create(['name' => 'White', 'code' => 'WHT']),
            Color::query()->create(['name' => 'Navy', 'code' => 'NVY']),
        ];
        $sizes = [];
        foreach (['S', 'M', 'L', 'XL'] as $index => $code) {
            $sizes[] = Size::query()->create(['name' => $code, 'code' => $code, 'sort_order' => $index + 1]);
        }

        $styles = [];
        $categories = ['Basic tee', 'Polo', 'Oxford shirt', 'Five-pocket pant', 'Hoodie', 'Kids tee', 'Jacket', 'Active tee', 'Tank', 'Denim shirt', 'Jogger', 'Sweatshirt', 'Legging', 'Overshirt', 'Romper'];
        foreach ($categories as $index => $category) {
            $styles[] = Style::query()->create([
                'name' => $category,
                'name_bn' => $category,
                'code' => 'ST'.str_pad((string) ($index + 1), 3, '0', STR_PAD_LEFT),
                'category' => $category,
                'buyer_id' => $buyers[$index % 3]->id,
                'smv' => 6 + ($index % 8),
                'status' => $index === 0 ? 'approved' : 'development',
                'unit_id' => $sewing->id,
                'description' => $category.' for export.',
            ]);
        }

        $costing = Costing::query()->create([
            'name' => 'Northwind tee v1',
            'style_id' => $styles[0]->id,
            'unit_id' => $sewing->id,
            'version' => 1,
            'status' => 'approved',
            'currency' => 'USD',
            'exchange_rate' => 122,
            'fabric_minor' => 90,
            'trims_minor' => 18,
            'cm_minor' => 55,
            'wash_minor' => 0,
            'print_minor' => 0,
            'test_minor' => 3,
            'overhead_minor' => 8,
            'commercial_minor' => 6,
            'profit_minor' => 15,
            'fob_minor' => 195,
            'smv' => 8.5,
            'efficiency' => 0.65,
            'line_cost_minor' => 18000,
            'consumption' => 0.22,
            'wastage_percent' => 5,
            'approved_at' => now(),
        ]);
        CostingLine::query()->create([
            'name' => 'Jersey body',
            'costing_id' => $costing->id,
            'item_id' => $fabric->id,
            'category' => 'fabric',
            'qty' => 0.22,
            'unit_cost_minor' => 350,
            'wastage_percent' => 5,
            'amount_minor' => 81,
        ]);

        Inquiry::query()->create(['name' => 'Northwind tee inquiry', 'buyer_id' => $buyers[0]->id, 'status' => 'won', 'source' => 'visit', 'product_type' => 'Basic tee', 'qty' => 12000, 'currency' => 'USD', 'unit_id' => $sewing->id, 'assigned_to' => $users['merchandiser']->id]);
        Inquiry::query()->create(['name' => 'Baltic polo inquiry', 'buyer_id' => $buyers[1]->id, 'status' => 'new', 'source' => 'website', 'product_type' => 'Polo', 'qty' => 8000, 'currency' => 'USD', 'unit_id' => $sewing->id]);
        Quotation::query()->create(['name' => 'Northwind quotation', 'buyer_id' => $buyers[0]->id, 'style_id' => $styles[0]->id, 'status' => 'accepted', 'currency' => 'USD', 'fob_minor' => 195, 'unit_id' => $sewing->id]);
        SampleRequest::query()->create(['name' => 'PP sample tee', 'style_id' => $styles[0]->id, 'buyer_id' => $buyers[0]->id, 'sample_type' => 'pp', 'status' => 'approved', 'due_on' => now()->subDays(20)->toDateString(), 'round' => 2, 'unit_id' => $sewing->id]);

        $stages = ['draft', 'material_wait', 'cutting', 'sewing', 'finishing', 'shipped', 'claimed', 'closed'];
        $orders = [];
        foreach ($stages as $index => $stage) {
            $order = BuyerOrder::query()->create([
                'name' => 'Order '.$stage,
                'buyer_id' => $buyers[$index % 3]->id,
                'style_id' => $styles[$index]->id,
                'costing_id' => $index === 0 ? $costing->id : null,
                'unit_id' => $sewing->id,
                'currency' => 'USD',
                'exchange_rate' => 122,
                'status' => $index === 0 ? 'draft' : $stage,
                'po_number' => 'PO-DEMO-'.str_pad((string) ($index + 1), 4, '0', STR_PAD_LEFT),
                'ship_on' => now()->addDays(20 + $index)->toDateString(),
                'ex_factory_on' => now()->addDays(18 + $index)->toDateString(),
                'qty' => 10000,
                'fob_minor' => 195,
                'merchandiser_id' => $users['merchandiser']->id,
            ]);
            $orders[] = $order;
        }

        $hero = $orders[0];
        app(WorkflowService::class)->transition($hero, 'confirmed', $users['super-admin']);
        foreach (['material_wait', 'cutting', 'sewing', 'finishing', 'shipped'] as $status) {
            app(WorkflowService::class)->transition($hero->fresh(), $status, $users['super-admin']);
        }

        $store = Store::query()->create(['name' => 'Fabric store', 'name_bn' => 'ফ্যাব্রিক স্টোর', 'code' => 'ST-FAB', 'kind' => 'fabric', 'unit_id' => $sewing->id]);
        $po = PurchaseOrder::query()->create(['name' => 'Fabric PO', 'supplier_id' => $suppliers[0]->id, 'buyer_order_id' => $hero->id, 'status' => 'received', 'currency' => 'USD', 'total_minor' => 770000, 'expected_on' => now()->subDays(5)->toDateString(), 'unit_id' => $sewing->id]);
        PurchaseOrderLine::query()->create(['name' => 'Jersey', 'purchase_order_id' => $po->id, 'item_id' => $fabric->id, 'qty' => 2200, 'price_minor' => 350, 'received_qty' => 2200]);
        $grn = GoodsReceipt::query()->create(['name' => 'GRN jersey', 'purchase_order_id' => $po->id, 'store_id' => $store->id, 'status' => 'posted', 'received_on' => now()->subDays(4)->toDateString(), 'unit_id' => $sewing->id]);
        GoodsReceiptLine::query()->create(['name' => 'Jersey accepted', 'goods_receipt_id' => $grn->id, 'item_id' => $fabric->id, 'qty' => 2200, 'accepted_qty' => 2200, 'rejected_qty' => 0, 'unit_cost_minor' => 350]);
        app(StockService::class)->receive($store->id, $fabric->id, '2200', 350, $hero->id, $sewing->id);
        app(StockService::class)->issue($store->id, $fabric->id, '800', $hero->id, $sewing->id);
        FabricRoll::query()->create(['name' => 'Roll 1001', 'store_id' => $store->id, 'item_id' => $fabric->id, 'buyer_order_id' => $hero->id, 'roll_no' => 'R1001', 'shade' => 'A', 'lot_no' => 'L1', 'gsm' => 160, 'width_inch' => 72, 'shrinkage_percent' => 3, 'length_meter' => 120, 'weight_kg' => 24, 'status' => 'allocated', 'barcode' => 'ROLL-R1001', 'unit_id' => $sewing->id]);

        $bom = Bom::query()->where('buyer_order_id', $hero->id)->first();
        $this->command?->info('Hero BOM '.($bom?->id ?? 'missing'));

        $plan = CutPlan::query()->create(['name' => 'Cut plan tee', 'buyer_order_id' => $hero->id, 'status' => 'cut', 'planned_qty' => 10000, 'cut_qty' => 10020, 'unit_id' => $sewing->id]);
        Bundle::query()->create(['name' => 'Bundle 1', 'cut_plan_id' => $plan->id, 'buyer_order_id' => $hero->id, 'color_id' => $colors[0]->id, 'size_id' => $sizes[1]->id, 'line_id' => $lines[0]->id, 'bundle_no' => 'B0001', 'shade' => 'A', 'qty' => 20, 'status' => 'sewn', 'barcode' => 'BND-0001', 'unit_id' => $sewing->id]);

        $aql = app(AqlService::class)->plan(10000, '2.5');
        $inspection = QcInspection::query()->create([
            'name' => 'Final inspection tee',
            'buyer_order_id' => $hero->id,
            'line_id' => $lines[0]->id,
            'stage' => 'final',
            'lot_qty' => 10000,
            'sample_size' => $aql['sample_size'],
            'aql' => $aql['aql'],
            'accept_point' => $aql['accept_point'],
            'reject_point' => $aql['reject_point'],
            'major' => 4,
            'minor' => 6,
            'critical' => 0,
            'result' => 'pass',
            'inspected_at' => now()->subDay(),
            'unit_id' => $sewing->id,
        ]);
        $defect = Defect::query()->create(['name' => 'Broken stitch', 'code' => 'BS', 'severity' => 'major', 'zone' => 'seam']);
        QcDefect::query()->create(['name' => 'Broken stitch', 'qc_inspection_id' => $inspection->id, 'defect_id' => $defect->id, 'qty' => 4, 'classification' => 'major']);

        Carton::query()->create(['name' => 'Carton 1', 'buyer_order_id' => $hero->id, 'carton_no' => 'C0001', 'pack_type' => 'solid', 'gross_kg' => 8, 'net_kg' => 7.2, 'cbm' => 0.04, 'barcode' => 'CTN-0001', 'status' => 'loaded', 'unit_id' => $sewing->id]);
        $shipment = Shipment::query()->create(['name' => 'Shipment tee', 'buyer_order_id' => $hero->id, 'status' => 'shipped', 'ship_on' => now()->subDay()->toDateString(), 'mode' => 'sea', 'container_no' => 'PADU1234567', 'cbm' => 28, 'cartons' => 400, 'unit_id' => $sewing->id]);
        $invoice = CommercialInvoice::query()->create(['name' => 'CI tee', 'shipment_id' => $shipment->id, 'buyer_order_id' => $hero->id, 'buyer_id' => $buyers[0]->id, 'invoice_no' => 'CI-2627-0001', 'currency' => 'USD', 'amount_minor' => 1950000, 'status' => 'realized', 'unit_id' => $sewing->id]);
        Realization::query()->create(['name' => 'Realization tee', 'commercial_invoice_id' => $invoice->id, 'amount_minor' => 1950000, 'realized_on' => now()->toDateString(), 'exchange_rate' => 122, 'gain_loss_minor' => 0]);
        $lc = LetterOfCredit::query()->create(['name' => 'Master LC Northwind', 'buyer_id' => $buyers[0]->id, 'buyer_order_id' => $hero->id, 'lc_type' => 'master', 'lc_number' => 'LC-NW-001', 'currency' => 'USD', 'amount_minor' => 2500000, 'utilized_minor' => 1950000, 'opened_on' => now()->subMonths(2)->toDateString(), 'expiry_on' => now()->addDays(10)->toDateString(), 'shipment_on' => now()->addDays(12)->toDateString(), 'status' => 'opened', 'unit_id' => $sewing->id]);
        LetterOfCredit::query()->create(['name' => 'BTB fabric', 'supplier_id' => $suppliers[0]->id, 'buyer_order_id' => $hero->id, 'lc_type' => 'btb', 'lc_number' => 'BTB-001', 'currency' => 'USD', 'amount_minor' => 900000, 'utilized_minor' => 770000, 'status' => 'opened', 'expiry_on' => now()->addMonths(2)->toDateString(), 'unit_id' => $sewing->id]);
        UtilizationDeclaration::query()->create(['name' => 'UD tee', 'letter_of_credit_id' => $lc->id, 'buyer_order_id' => $hero->id, 'ud_number' => 'UD-001', 'amount_minor' => 1950000, 'status' => 'utilized', 'expires_on' => now()->addDays(20)->toDateString(), 'unit_id' => $sewing->id]);

        $sales = LedgerAccount::query()->create(['name' => 'Export sales', 'code' => '4000', 'account_type' => 'income']);
        $cash = LedgerAccount::query()->create(['name' => 'Bank', 'code' => '1000', 'account_type' => 'asset']);
        $entry = JournalEntry::query()->create(['name' => 'Realize CI tee', 'entry_on' => now()->toDateString(), 'reference' => 'CI-2627-0001', 'status' => 'posted', 'currency' => 'USD', 'unit_id' => $sewing->id]);
        JournalLine::query()->create(['name' => 'Bank debit', 'journal_entry_id' => $entry->id, 'ledger_account_id' => $cash->id, 'buyer_order_id' => $hero->id, 'debit_minor' => 1950000, 'credit_minor' => 0, 'unit_id' => $sewing->id]);
        JournalLine::query()->create(['name' => 'Sales credit', 'journal_entry_id' => $entry->id, 'ledger_account_id' => $sales->id, 'buyer_order_id' => $hero->id, 'debit_minor' => 0, 'credit_minor' => 1950000, 'unit_id' => $sewing->id]);

        Certificate::query()->create(['name' => 'Fire licence', 'standard' => 'Fire', 'certificate_no' => 'FL-100', 'issued_on' => now()->subYear()->toDateString(), 'expires_on' => now()->addDays(10)->toDateString(), 'is_public' => true, 'status' => 'expiring', 'unit_id' => $sewing->id]);
        Certificate::query()->create(['name' => 'WRAP', 'standard' => 'WRAP', 'certificate_no' => 'WRAP-200', 'issued_on' => now()->subMonths(6)->toDateString(), 'expires_on' => now()->addYear()->toDateString(), 'is_public' => true, 'status' => 'valid', 'unit_id' => $sewing->id]);
        EsgRecord::query()->create(['name' => 'October ESG', 'period' => '2026-10', 'energy_kwh' => 82000, 'water_m3' => 1400, 'waste_kg' => 900, 'carbon_kg' => 41000, 'unit_id' => $sewing->id]);

        $type = IssueType::query()->create(['name' => 'Trim shortage', 'code' => 'trim_shortage', 'severity_default' => 'high', 'sla_hours' => 24, 'module' => 'inventory']);
        $playbook = Playbook::query()->create(['name' => 'Trim shortage playbook', 'issue_type_id' => $type->id]);
        foreach (['Check store transfer', 'Ask alternate supplier', 'Buyer substitute approval', 'Re-plan the line'] as $index => $step) {
            PlaybookStep::query()->create(['name' => $step, 'playbook_id' => $playbook->id, 'sort_order' => $index + 1, 'instructions' => $step]);
        }
        $engine = app(IssueEngine::class);
        $severities = ['critical', 'high', 'medium', 'low'];
        for ($i = 1; $i <= 20; $i++) {
            $engine->raise([
                'name' => 'Open issue '.$i,
                'issue_type_id' => $type->id,
                'severity' => $severities[$i % 4],
                'buyer_order_id' => $orders[$i % count($orders)]->id,
                'line_id' => $lines[$i % 10]->id,
                'unit_id' => $sewing->id,
                'description' => 'Seeded factory issue '.$i,
                'root_cause' => $i <= 3 ? 'Material' : 'Method',
                'owner_id' => $users['merchandiser']->id,
                'reporter_id' => $users['line-supervisor']->id,
            ]);
        }

        $this->bulkPeople($sewing->id, $departments['Sewing']->id, $operator->id);
        $this->bulkHours($sewing->id, $lines, $hero->id, $styles[0]->id);
        $this->website($buyers[0]->name);

        $worker = Employee::query()->orderBy('id')->first();
        if ($worker instanceof Employee) {
            $users['worker']->employee_id = $worker->id;
            $users['worker']->save();
        }

        GarmentModel::$auditing = true;
    }

    private function unit(Company $company, string $code, string $name, string $kind): Unit
    {
        return Unit::query()->create([
            'name' => $name,
            'name_bn' => $name,
            'company_id' => $company->id,
            'code' => $code,
            'kind' => $kind,
            'address' => 'Tongi, Gazipur',
        ]);
    }

    /** @param  list<string>  $modules
     * @return array<string, User>
     */
    private function users(string $password, Unit $unit, array $modules): array
    {
        $map = [
            'super-admin' => ['Rahim Uddin', 'রহিম উদ্দিন', 'admin', ['admin', 'floor', 'buyer', 'supplier', 'employee'], ['*'], true],
            'gm' => ['Karim Chowdhury', 'করিম চৌধুরী', 'admin', ['admin', 'floor'], ['*'], true],
            'director' => ['Nabila Rahman', 'নাবিলা রহমান', 'admin', ['admin'], $this->moduleGrants($modules), true],
            'merchandising-manager' => ['Farhana Akter', 'ফারহানা আক্তার', 'admin', ['admin'], ['module.marketing', 'module.style', 'module.sampling', 'module.orders'], true],
            'merchandiser' => ['Imran Hossain', 'ইমরান হোসেন', 'admin', ['admin'], ['module.marketing', 'module.style', 'module.sampling', 'module.orders'], false],
            'sample-incharge' => ['Sadia Islam', 'সাদিয়া ইসলাম', 'admin', ['admin'], ['module.sampling'], false],
            'pattern-master' => ['Jamal Uddin', 'জামাল উদ্দিন', 'admin', ['admin'], ['module.sampling', 'module.style'], false],
            'commercial-manager' => ['Tania Sultana', 'তানিয়া সুলতানা', 'admin', ['admin'], ['module.commercial', 'module.accounts'], true],
            'commercial-executive' => ['Rafi Ahmed', 'রাফি আহমেদ', 'admin', ['admin'], ['module.commercial'], false],
            'purchase-manager' => ['Hasan Ali', 'হাসান আলী', 'admin', ['admin'], ['module.procurement', 'module.inventory'], true],
            'store-manager' => ['Mitu Begum', 'মিতু বেগম', 'admin', ['admin', 'floor'], ['module.inventory', 'module.lab'], false],
            'planning-manager' => ['Sohel Rana', 'সোহেল রানা', 'admin', ['admin'], ['module.planning', 'module.orders', 'module.cutting'], false],
            'cutting-manager' => ['Shahin Alam', 'শাহিন আলম', 'admin', ['admin', 'floor'], ['module.cutting'], false],
            'sewing-manager' => ['Rokeya Khatun', 'রোকেয়া খাতুন', 'admin', ['admin', 'floor'], ['module.sewing', 'module.planning'], false],
            'line-chief' => ['Monir Mia', 'মনির মিয়া', 'floor', ['floor'], ['module.sewing'], false],
            'line-supervisor' => ['Ayesha Siddika', 'আয়েশা সিদ্দিকা', 'floor', ['floor'], ['module.sewing'], false],
            'quality-manager' => ['Nusrat Jahan', 'নুসরাত জাহান', 'admin', ['admin', 'floor'], ['module.quality', 'module.lab'], false],
            'line-qc' => ['Bithi Akter', 'বিথি আক্তার', 'floor', ['floor'], ['module.quality'], false],
            'final-inspector' => ['Polash Roy', 'পলাশ রায়', 'floor', ['floor'], ['module.quality'], false],
            'wash-manager' => ['Liton Das', 'লিটন দাস', 'admin', ['admin', 'floor'], ['module.wash'], false],
            'finishing-incharge' => ['Shila Rani', 'শীলা রানী', 'floor', ['floor'], ['module.finishing'], false],
            'shipping-manager' => ['Omar Faruk', 'ওমর ফারুক', 'admin', ['admin'], ['module.shipping', 'module.commercial'], false],
            'maintenance-manager' => ['Kamal Hossain', 'কামাল হোসেন', 'admin', ['admin', 'floor'], ['module.maintenance'], false],
            'mechanic' => ['Rubel Mia', 'রুবেল মিয়া', 'floor', ['floor'], ['module.maintenance'], false],
            'hr-manager' => ['Lamia Khan', 'লামিয়া খান', 'admin', ['admin'], ['module.hr'], true],
            'compliance-officer' => ['Arif Mahmud', 'আরিফ মাহমুদ', 'admin', ['admin'], ['module.compliance'], false],
            'welfare-officer' => ['Sumi Akter', 'সুমি আক্তার', 'admin', ['admin'], ['module.hr', 'module.compliance'], false],
            'accounts-manager' => ['Zahid Hasan', 'জাহিদ হাসান', 'admin', ['admin'], ['module.accounts', 'module.commercial'], true],
            'accountant' => ['Mim Rahman', 'মিম রহমান', 'admin', ['admin'], ['module.accounts'], false],
            'security-guard' => ['Abdul Malek', 'আব্দুল মালেক', 'floor', ['floor'], ['module.shipping'], false],
            'it-admin' => ['Tanvir Islam', 'তানভীর ইসলাম', 'admin', ['admin'], ['module.foundation'], true],
            'auditor' => ['External Auditor', 'নিরীক্ষক', 'admin', ['admin'], ['audit.readonly'], false],
            'buyer' => ['Elena Vogel', 'এলেনা ভোগেল', 'buyer', ['buyer'], ['view_any.buyer_order', 'view.buyer_order', 'view_any.tna_milestone', 'view.tna_milestone', 'view_any.qc_inspection', 'view.qc_inspection', 'view_any.shipment', 'view.shipment'], false],
            'supplier' => ['Mill Desk', 'মিল ডেস্ক', 'supplier', ['supplier'], ['view_any.purchase_order', 'view.purchase_order', 'update.purchase_order', 'view_any.supplier_invoice', 'create.supplier_invoice'], false],
            'worker' => ['Rina Akter', 'রিনা আক্তার', 'employee', ['employee'], ['view.payroll_line', 'view_any.leave_request', 'create.leave_request', 'view_any.announcement'], false],
        ];

        $created = [];
        foreach ($map as $slug => [$name, $nameBn, $portal, $panels, $grants, $twoFa]) {
            $role = Role::query()->create([
                'name' => str_replace('-', ' ', $slug),
                'name_bn' => $nameBn,
                'slug' => $slug,
                'panels' => $panels,
                'modules' => $grants,
                'requires_2fa' => $twoFa,
            ]);
            $permissionIds = [];
            foreach ($grants as $grant) {
                $permission = Permission::query()->firstOrCreate(
                    ['slug' => $grant],
                    ['name' => $grant, 'module' => str_contains($grant, '.') ? explode('.', $grant)[1] ?? 'foundation' : 'foundation'],
                );
                $permissionIds[] = $permission->id;
            }
            $role->permissions()->sync($permissionIds);
            $user = User::query()->create([
                'name' => $name,
                'name_bn' => $nameBn,
                'email' => $slug.'@padma.test',
                'password' => $password,
                'locale' => 'en',
                'is_active' => true,
                'portal' => $portal,
                'current_unit_id' => $unit->id,
            ]);
            $user->roles()->sync([$role->id]);
            $user->units()->sync([$unit->id]);
            $created[$slug] = $user;
        }

        return $created;
    }

    /** @param  list<string>  $modules
     * @return list<string>
     */
    private function moduleGrants(array $modules): array
    {
        return array_map(fn (string $module): string => 'module.'.$module, $modules);
    }

    private function bulkPeople(int $unitId, int $departmentId, int $designationId): void
    {
        $count = max(1, (int) config('garment.demo_employees', 600));
        $now = now();
        $payroll = app(PayrollService::class);
        $rows = [];
        for ($i = 1; $i <= $count; $i++) {
            $rows[] = [
                'public_id' => (string) Str::ulid(),
                'name' => 'Worker '.$i,
                'name_bn' => 'কর্মী '.$i,
                'unit_id' => $unitId,
                'department_id' => $departmentId,
                'designation_id' => $designationId,
                'employee_code' => 'E'.str_pad((string) $i, 5, '0', STR_PAD_LEFT),
                'gender' => $i % 3 === 0 ? 'male' : 'female',
                'joined_on' => '2024-01-15',
                'grade' => '5',
                'basic_minor' => 1600000,
                'status' => $i % 17 === 0 ? 'probation' : 'confirmed',
                'created_at' => $now,
                'updated_at' => $now,
            ];
            if (count($rows) === 200) {
                DB::table('employees')->insert($rows);
                $rows = [];
            }
        }
        if ($rows !== []) {
            DB::table('employees')->insert($rows);
        }

        $periods = [];
        foreach ([8, 9, 10] as $month) {
            $period = PayrollPeriod::query()->create([
                'name' => 'Payroll 2026-'.$month,
                'year' => 2026,
                'month' => $month,
                'status' => 'paid',
                'starts_on' => sprintf('2026-%02d-01', $month),
                'ends_on' => sprintf('2026-%02d-28', $month),
                'unit_id' => $unitId,
            ]);
            $periods[] = $period;
        }

        $payRows = [];
        $employeeIds = DB::table('employees')->orderBy('id')->pluck('id');
        foreach ($periods as $period) {
            $money = $payroll->calculate(1600000, '8', 0, 0, 0, 0);
            foreach ($employeeIds as $employeeId) {
                $payRows[] = [
                    'public_id' => (string) Str::ulid(),
                    'name' => 'Pay '.$employeeId,
                    'payroll_period_id' => $period->id,
                    'employee_id' => $employeeId,
                    'basic_minor' => 1600000,
                    'ot_hours' => 8,
                    'ot_minor' => $money['ot_minor'],
                    'bonus_minor' => 0,
                    'incentive_minor' => 0,
                    'advance_minor' => 0,
                    'deduction_minor' => 0,
                    'net_minor' => $money['net_minor'],
                    'absent_days' => 0,
                    'flags' => json_encode($money['flags']),
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
                if (count($payRows) === 300) {
                    DB::table('payroll_lines')->insert($payRows);
                    $payRows = [];
                }
            }
        }
        if ($payRows !== []) {
            DB::table('payroll_lines')->insert($payRows);
        }
    }

    /** @param  list<Line>  $lines */
    private function bulkHours(int $unitId, array $lines, int $orderId, int $styleId): void
    {
        $efficiency = app(EfficiencyService::class);
        $days = max(1, (int) config('garment.demo_history_days', 30));
        $now = now();
        $rows = [];
        for ($day = $days; $day >= 1; $day--) {
            $date = now()->subDays($day)->toDateString();
            foreach ($lines as $line) {
                for ($hour = 8; $hour <= 15; $hour++) {
                    $actual = 40 + (($line->id + $hour + $day) % 25);
                    $rows[] = [
                        'public_id' => (string) Str::ulid(),
                        'name' => 'Hour '.$date.' '.$hour,
                        'unit_id' => $unitId,
                        'line_id' => $line->id,
                        'buyer_order_id' => $orderId,
                        'style_id' => $styleId,
                        'produced_on' => $date,
                        'hour' => $hour,
                        'target_qty' => 55,
                        'actual_qty' => $actual,
                        'operators' => 25,
                        'smv' => 8.5,
                        'efficiency' => $efficiency->efficiencyPercent($actual, '8.5', 25, 60),
                        'dhu' => 3.5,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ];
                    if (count($rows) === 400) {
                        DB::table('hourly_productions')->insert($rows);
                        $rows = [];
                    }
                }
            }
        }
        if ($rows !== []) {
            DB::table('hourly_productions')->insert($rows);
        }
    }

    private function website(string $buyerName): void
    {
        foreach ([
            ['about', 'About us', 'Padma Apparel sews, washes and embroiders for export buyers from Gazipur.'],
            ['privacy', 'Privacy policy', 'Role and unit access limits who can see employee and buyer data.'],
            ['terms', 'Terms', 'A quotation is valid until the printed date. Production follows confirmation.'],
            ['code-of-conduct', 'Code of conduct', 'No child labour. Overtime stays inside the configured legal limit. Grievances stay confidential.'],
        ] as [$slug, $title, $body]) {
            CmsPage::query()->create(['name' => $title, 'title' => $title, 'slug' => $slug, 'locale' => 'en', 'body' => $body, 'seo_title' => $title, 'seo_description' => $body, 'is_published' => true]);
        }
        foreach (['Basic tee', 'Polo', 'Shirt', 'Denim', 'Jacket', 'Kids'] as $index => $name) {
            ProductCategory::query()->create(['name' => $name, 'name_bn' => $name, 'slug' => Str::slug($name), 'locale' => 'en', 'summary' => $name.' cut and sewn in Gazipur.', 'moq' => 3000, 'lead_days' => 45 + $index, 'is_published' => true]);
        }
        NewsPost::query()->create(['name' => 'Line expansion', 'title' => 'Ten sewing lines now loaded', 'slug' => 'ten-sewing-lines', 'locale' => 'en', 'body' => 'Unit 1 is running ten sewing lines.', 'published_at' => now(), 'seo_title' => 'Line expansion']);
        CaseStudy::query()->create(['name' => 'Northwind tee', 'title' => 'On-time tee program', 'slug' => 'northwind-tee', 'locale' => 'en', 'body' => 'From PP approval to shipment without a claim.', 'buyer_name' => $buyerName]);
        Faq::query()->create(['name' => 'MOQ', 'locale' => 'en', 'question' => 'What is the MOQ?', 'answer' => 'Usually 3,000 pieces per color for a basic tee.', 'sort_order' => 1]);
        DownloadItem::query()->create(['name' => 'Company profile', 'title' => 'Company profile', 'slug' => 'company-profile', 'locale' => 'en', 'file_path' => 'downloads/profile.pdf']);
        JobPost::query()->create(['name' => 'Sewing operator', 'title' => 'Sewing operator', 'slug' => 'sewing-operator', 'body' => 'Experienced single-needle operators for Unit 1.', 'vacancies' => 40, 'status' => 'published', 'closes_on' => now()->addMonth()->toDateString()]);
    }
}
