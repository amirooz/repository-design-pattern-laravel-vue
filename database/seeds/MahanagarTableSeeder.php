<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahanagarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mahanagars')->insert([
            ['name' => 'Barishal CC', 'sort_id' => 1, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"), 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Chattogram CC', 'sort_id' => 2, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"), 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Cumilla CC', 'sort_id' => 3, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"), 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Dhaka North CC', 'sort_id' => 4, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"), 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Dhaka South CC', 'sort_id' => 5, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"), 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Gazipur CC', 'sort_id' => 6, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"), 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Narayanganj CC', 'sort_id' => 7, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"), 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Khulna CC', 'sort_id' => 8, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"), 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Mymensingh CC', 'sort_id' => 9, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"), 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Rajshahi CC', 'sort_id' => 10, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"), 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Rangpur CC', 'sort_id' => 11, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"), 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Sylhet CC', 'sort_id' => 12, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"), 'created_by' => 1, 'updated_by' => 1],
            
        ]);
    }
}
