<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Services\Reports\ReportService;
use Illuminate\Console\Command;

class MorningReportCommand extends Command
{
    protected $signature = 'garment:morning-report';

    protected $description = 'Email and log the daily factory morning report';

    public function handle(ReportService $reports): int
    {
        $reports->dispatchMorning();
        $this->info($reports->morningText());

        return self::SUCCESS;
    }
}
