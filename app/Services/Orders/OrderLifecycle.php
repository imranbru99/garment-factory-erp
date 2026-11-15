<?php

declare(strict_types=1);

namespace App\Services\Orders;

use App\Events\OrderConfirmed;
use App\Models\BuyerOrder;
use App\Services\Bom\BomService;
use App\Services\Planning\TnaService;

class OrderLifecycle
{
    public function __construct(
        private readonly BomService $boms,
        private readonly TnaService $tna,
    ) {}

    public function onConfirmed(BuyerOrder $order): void
    {
        $order = $order->fresh() ?? $order;
        $this->boms->ensureForOrder($order);
        $this->tna->buildForOrder($order);
    }

    public function confirm(BuyerOrder $order): BuyerOrder
    {
        event(new OrderConfirmed($order));

        return $order;
    }
}
