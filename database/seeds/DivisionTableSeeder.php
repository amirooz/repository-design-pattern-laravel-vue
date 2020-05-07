<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('divisions')->insert([
            ['name' => 'Barishal', 'sort_id' => 1, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"), 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Chattogram', 'sort_id' => 2, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"), 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Dhaka', 'sort_id' => 3, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"), 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Khulna', 'sort_id' => 4, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"), 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Mymensingh', 'sort_id' => 5, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"), 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Rajshahi', 'sort_id' => 6, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"), 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Rangpur', 'sort_id' => 7, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"), 'created_by' => 1, 'updated_by' => 1],
            ['name' => 'Sylhet', 'sort_id' => 8, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"), 'created_by' => 1, 'updated_by' => 1],
        ]);
    }
}
