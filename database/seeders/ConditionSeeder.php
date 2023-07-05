<?php

namespace Database\Seeders;

use App\Models\Conditions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Conditions::create(['description' => 'Pengecekan rutin', 'inventory_id' => 1]);
        Conditions::create(['description' => 'Maintenance', 'inventory_id' => 1]);
        Conditions::create(['description' => 'Pengecekan rutin', 'inventory_id' => 1]);
        //
        Conditions::create(['description' => 'Pengecekan rutin', 'inventory_id' => 4]);
        Conditions::create(['description' => 'Maintenance', 'inventory_id' => 4]);
        Conditions::create(['description' => 'Pengecekan rutin', 'inventory_id' => 4]);
        //
        Conditions::create(['description' => 'Pengecekan rutin', 'inventory_id' => 5]);
        Conditions::create(['description' => 'Maintenance', 'inventory_id' => 5]);
        Conditions::create(['description' => 'Pengecekan rutin', 'inventory_id' => 5]);
        //
        Conditions::create(['description' => 'Pengecekan rutin', 'inventory_id' => 9]);
        Conditions::create(['description' => 'Maintenance', 'inventory_id' => 9]);
        Conditions::create(['description' => 'Pengecekan rutin', 'inventory_id' => 9]);
    }
}
