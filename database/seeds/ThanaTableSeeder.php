<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThanaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('thanas')->insert([
            [
                'name' => 'Pollobi', 
                'mahanagar_id' => 4,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'created_by' => 1,
                'updated_by' => 1,
                'sort_id' => 1
            ],
            [
                'name' => 'Wari',
                'mahanagar_id' => 5,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'created_by' => 1,
                'updated_by' => 1,
                'sort_id' => 1
            ],
            
        ]);
    }
}
