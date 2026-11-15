<?php

declare(strict_types=1);

namespace App\Services\Notifications;

use App\Models\NotificationLog;
use Illuminate\Support\Facades\Mail;
use Throwable;

class Notifier
{
    public function send(string $channel, string $recipient, string $body, string $locale = 'en', ?int $unitId = null): NotificationLog
    {
        $status = 'logged';
        if ($channel === 'email' && $recipient !== '' && filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
            try {
                Mail::raw($body, function ($message) use ($recipient): void {
                    $message->to($recipient)->subject('Padma Apparel');
                });
                $status = 'sent';
            } catch (Throwable) {
                $status = 'skipped_unconfigured';
            }
        }

        if (in_array($channel, ['sms', 'whatsapp'], true)) {
            $status = 'skipped_unconfigured';
        }

        return NotificationLog::query()->create([
            'name' => strtoupper($channel).' '.$recipient,
            'channel' => $channel,
            'locale' => $locale,
            'recipient' => $recipient,
            'status' => $status,
            'body' => $body,
            'sent_at' => now(),
            'unit_id' => $unitId,
        ]);
    }
}
