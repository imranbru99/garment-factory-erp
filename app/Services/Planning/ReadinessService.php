<?php

declare(strict_types=1);

namespace App\Services\Planning;

use App\Models\BuyerOrder;
use App\Models\MaterialRequirement;

class ReadinessService
{
    public function materialPercent(BuyerOrder $order): string
    {
        $rows = MaterialRequirement::query()->where('buyer_order_id', $order->id)->get();
        $required = '0';
        $covered = '0';
        foreach ($rows as $row) {
            $required = bcadd($required, (string) $row->required_qty, 4);
            $received = (string) $row->received_qty;
            $piece = bccomp($received, (string) $row->required_qty, 4) < 0 ? $received : (string) $row->required_qty;
            $covered = bcadd($covered, $piece, 4);
        }

        if (bccomp($required, '0', 4) <= 0) {
            return '0.0000';
        }

        return bcmul(bcdiv($covered, $required, 6), '100', 4);
    }
}
