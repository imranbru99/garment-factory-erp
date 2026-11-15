<?php

declare(strict_types=1);

namespace App\Services\Bom;

use App\Models\Bom;
use App\Models\BomLine;
use App\Models\BuyerOrder;
use App\Models\CostingLine;
use App\Models\MaterialRequirement;

class BomService
{
    public function requiredQuantity(string $orderQty, string $consumption, string $wastagePercent): string
    {
        $factor = bcadd('1', bcdiv($wastagePercent, '100', 8), 8);
        $gross = bcmul(bcmul($orderQty, $consumption, 8), $factor, 8);

        return bcadd($gross, '0', 4);
    }

    public function ensureForOrder(BuyerOrder $order): Bom
    {
        $existing = Bom::query()->where('buyer_order_id', $order->id)->orderByDesc('id')->first();
        if ($existing instanceof Bom) {
            return $existing;
        }

        $bom = Bom::query()->create([
            'name' => 'BOM '.$order->po_number,
            'name_bn' => 'বিওএম '.$order->po_number,
            'buyer_order_id' => $order->id,
            'style_id' => $order->style_id,
            'unit_id' => $order->unit_id,
            'version' => 1,
            'status' => 'draft',
        ]);

        if ($order->costing_id) {
            $lines = CostingLine::query()->where('costing_id', $order->costing_id)->get();
            foreach ($lines as $line) {
                $wastage = (string) ($line->wastage_percent ?? '0');
                $required = $this->requiredQuantity((string) $order->qty, (string) $line->qty, $wastage);
                BomLine::query()->create([
                    'name' => $line->name,
                    'bom_id' => $bom->id,
                    'item_id' => $line->item_id,
                    'consumption' => $line->qty,
                    'wastage_percent' => $wastage,
                    'required_qty' => $required,
                ]);
                $this->upsertRequirement($order, $line->item_id, $required);
            }
        }

        return $bom;
    }

    public function upsertRequirement(BuyerOrder $order, ?int $itemId, string $required): MaterialRequirement
    {
        $requirement = MaterialRequirement::query()->firstOrNew([
            'buyer_order_id' => $order->id,
            'item_id' => $itemId,
        ]);
        $requirement->name = 'Requirement '.($itemId ?? 'na');
        $requirement->unit_id = $order->unit_id;
        $requirement->required_qty = (float) $required;
        $received = (string) ($requirement->received_qty ?? '0');
        $requirement->status = $this->coverageStatus($required, $received);
        $requirement->save();

        return $requirement;
    }

    public function coverageStatus(string $required, string $received): string
    {
        if (bccomp($received, $required, 4) >= 0 && bccomp($required, '0', 4) > 0) {
            return 'covered';
        }

        if (bccomp($received, '0', 4) > 0) {
            return 'partial';
        }

        return 'open';
    }
}
