<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Certificate;
use App\Models\LetterOfCredit;
use App\Services\Notifications\Notifier;
use Illuminate\Console\Command;

class ExpiryAlertCommand extends Command
{
    protected $signature = 'garment:expiry-alerts';

    protected $description = 'Log countdown alerts for LCs and compliance certificates';

    public function handle(Notifier $notifier): int
    {
        $sent = 0;
        foreach ([60, 30, 15, 7, 1] as $days) {
            $on = now()->addDays($days)->toDateString();
            $lcs = LetterOfCredit::query()->whereDate('expiry_on', $on)->whereIn('status', ['opened', 'amended'])->get();
            foreach ($lcs as $lc) {
                $notifier->send('email', 'commercial@padma.test', "LC {$lc->lc_number} expires in {$days} days.", 'en', $lc->unit_id);
                $sent++;
            }
            $certificates = Certificate::query()->whereDate('expires_on', $on)->get();
            foreach ($certificates as $certificate) {
                $notifier->send('email', 'compliance@padma.test', "{$certificate->name} expires in {$days} days.", 'en', $certificate->unit_id);
                $sent++;
            }
        }

        $this->info("Logged {$sent} expiry alerts.");

        return self::SUCCESS;
    }
}
