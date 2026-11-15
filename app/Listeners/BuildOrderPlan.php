<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\OrderConfirmed;
use App\Services\Orders\OrderLifecycle;
use Illuminate\Contracts\Queue\ShouldQueue;

class BuildOrderPlan implements ShouldQueue
{
    public function handle(OrderConfirmed $event): void
    {
        app(OrderLifecycle::class)->onConfirmed($event->order);
    }
}
