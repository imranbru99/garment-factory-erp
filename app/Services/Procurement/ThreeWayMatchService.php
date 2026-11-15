<?php

declare(strict_types=1);

namespace App\Services\Procurement;

use App\Models\GoodsReceipt;
use App\Models\GoodsReceiptLine;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderLine;
use App\Models\SupplierInvoice;

class ThreeWayMatchService
{
    public function match(PurchaseOrder $order, GoodsReceipt $receipt, SupplierInvoice $invoice, int $toleranceMinor = 0): string
    {
        $expected = 0;
        $orderedQty = '0';
        foreach (PurchaseOrderLine::query()->where('purchase_order_id', $order->id)->get() as $line) {
            $expected += (int) round((float) $line->qty * (int) $line->price_minor);
            $orderedQty = bcadd($orderedQty, (string) $line->qty, 4);
        }

        $accepted = '0';
        foreach (GoodsReceiptLine::query()->where('goods_receipt_id', $receipt->id)->get() as $line) {
            $accepted = bcadd($accepted, (string) $line->accepted_qty, 4);
        }

        $amountGap = abs((int) $invoice->amount_minor - $expected);
        if ($amountGap > $toleranceMinor || bccomp($accepted, $orderedQty, 4) !== 0) {
            return 'mismatch';
        }

        return 'matched';
    }
}
