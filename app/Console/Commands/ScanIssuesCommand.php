<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Services\Issues\IssueEngine;
use Illuminate\Console\Command;

class ScanIssuesCommand extends Command
{
    protected $signature = 'garment:scan-issues';

    protected $description = 'Open issues for late TNA, LC and certificate expiry, low efficiency and reorder breaches';

    public function handle(IssueEngine $engine): int
    {
        $created = $engine->scan();
        $escalated = $engine->escalate();
        $this->info("Opened {$created} issues. Escalated {$escalated}.");

        return self::SUCCESS;
    }
}
