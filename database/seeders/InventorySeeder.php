<?php

namespace Database\Seeders;

use App\Models\Inventory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Inventory::create(['name' => 'Boiler', 'status' => 'unprocess', 'warehouse_id' => 1]);
        Inventory::create(['name' => 'Mesin Kecil', 'status' => 'delay', 'warehouse_id' => 1]);
        Inventory::create(['name' => 'Mesin Besar', 'status' => 'process', 'warehouse_id' => 1]);
        Inventory::create(['name' => 'Power Unit', 'status' => 'delay', 'warehouse_id' => 1]);
        Inventory::create(['name' => 'Tabung Turbin', 'status' => 'done', 'warehouse_id' => 1]);

        Inventory::create(['name' => 'Boiler', 'status' => 'unprocess', 'warehouse_id' => 2]);
        Inventory::create(['name' => 'Mesin Kecil', 'status' => 'delay', 'warehouse_id' => 2]);
        Inventory::create(['name' => 'Mesin Besar', 'status' => 'delay', 'warehouse_id' => 2]);
        Inventory::create(['name' => 'Power Unit', 'status' => 'done', 'warehouse_id' => 2]);
        Inventory::create(['name' => 'Tabung Turbin', 'status' => 'done', 'warehouse_id' => 2]);
    }
}
