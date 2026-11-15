<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Models\Bundle;
use App\Models\BundleScan;
use App\Models\BuyerOrder;
use App\Models\IssueType;
use App\Models\NotificationLog;
use App\Services\Issues\IssueEngine;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FactoryApiController
{
    public function orders(Request $request): JsonResponse
    {
        $orders = BuyerOrder::query()->latest('id')->limit(50)->get(['id', 'public_id', 'name', 'po_number', 'status', 'qty', 'ship_on', 'buyer_id']);

        return response()->json(['data' => $orders]);
    }

    public function scan(Request $request): JsonResponse
    {
        $data = $request->validate([
            'barcode' => ['required', 'string', 'max:120'],
            'direction' => ['required', 'in:in,out'],
            'qty' => ['nullable', 'numeric', 'min:0'],
        ]);

        $key = (string) $request->header('Idempotency-Key', '');
        if ($key !== '' && Cache::has('scan:'.$key)) {
            return response()->json(Cache::get('scan:'.$key));
        }

        $bundle = Bundle::query()->where('barcode', $data['barcode'])->first();
        $scan = BundleScan::query()->create([
            'name' => $data['barcode'].' '.$data['direction'],
            'bundle_id' => $bundle?->id,
            'direction' => $data['direction'],
            'qty' => $data['qty'] ?? ($bundle->qty ?? 1),
            'scanned_at' => now(),
            'scanned_by' => $request->user()?->id,
            'unit_id' => $bundle?->unit_id,
            'line_id' => $bundle?->line_id,
        ]);

        $payload = ['id' => $scan->id, 'public_id' => $scan->public_id, 'bundle_id' => $scan->bundle_id];
        if ($key !== '') {
            Cache::put('scan:'.$key, $payload, now()->addDay());
        }

        return response()->json($payload, 201);
    }

    public function issue(Request $request, IssueEngine $engine): JsonResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:180'],
            'description' => ['nullable', 'string'],
            'severity' => ['nullable', 'in:critical,high,medium,low'],
            'line_id' => ['nullable', 'integer'],
            'buyer_order_id' => ['nullable', 'integer'],
        ]);

        $type = IssueType::query()->firstOrCreate(
            ['code' => 'floor_raise'],
            ['name' => 'Floor issue', 'severity_default' => 'high', 'sla_hours' => 8, 'module' => 'issues'],
        );

        $issue = $engine->raise([
            'name' => $data['name'],
            'description' => $data['description'] ?? null,
            'severity' => $data['severity'] ?? 'high',
            'issue_type_id' => $type->id,
            'line_id' => $data['line_id'] ?? null,
            'buyer_order_id' => $data['buyer_order_id'] ?? null,
            'reporter_id' => $request->user()?->id,
            'unit_id' => $request->user()?->current_unit_id,
        ]);

        return response()->json(['id' => $issue->id, 'public_id' => $issue->public_id, 'status' => $issue->status], 201);
    }

    public function webhook(Request $request): JsonResponse
    {
        $secret = (string) config('garment.webhook_secret');
        $given = (string) $request->header('X-Signature');
        $expected = hash_hmac('sha256', $request->getContent(), $secret);
        if ($given === '' || ! hash_equals($expected, $given)) {
            abort(401);
        }

        NotificationLog::query()->create([
            'name' => 'Inbound webhook',
            'channel' => 'webhook',
            'status' => 'logged',
            'body' => $request->getContent(),
            'sent_at' => now(),
        ]);

        return response()->json(['ok' => true]);
    }
}
