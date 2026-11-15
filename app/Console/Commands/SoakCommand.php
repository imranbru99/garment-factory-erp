<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Closure;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SoakCommand extends Command
{
    protected $signature = 'garment:soak {--bundles=0} {--scans=0}';

    protected $description = 'Insert bundle and scan rows for capacity checks. Does not run inside the demo seed.';

    public function handle(): int
    {
        $bundles = max(0, (int) $this->option('bundles'));
        $scans = max(0, (int) $this->option('scans'));
        $now = now();
        $this->insert('bundles', $bundles, function (int $index) use ($now): array {
            return [
                'public_id' => (string) Str::ulid(),
                'name' => 'Soak bundle '.$index,
                'qty' => 20,
                'status' => 'created',
                'barcode' => 'SOAK-'.$index.'-'.Str::lower(Str::random(6)),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        });
        $this->insert('bundle_scans', $scans, function (int $index) use ($now): array {
            return [
                'public_id' => (string) Str::ulid(),
                'name' => 'Soak scan '.$index,
                'direction' => 'in',
                'qty' => 20,
                'scanned_at' => $now,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        });

        $this->info("Inserted {$bundles} bundles and {$scans} scans.");

        return self::SUCCESS;
    }

    private function insert(string $table, int $count, Closure $row): void
    {
        if ($count <= 0) {
            return;
        }

        foreach (array_chunk(range(1, $count), 500) as $chunk) {
            $rows = [];
            foreach ($chunk as $index) {
                $rows[] = $row((int) $index);
            }
            DB::table($table)->insert($rows);
        }
    }
}
