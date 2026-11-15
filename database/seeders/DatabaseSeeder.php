<?php

namespace Database\Seeders;

use App\Models\GarmentModel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        GarmentModel::$auditing = true;
        $this->call(FactoryDemoSeeder::class);
    }
}
