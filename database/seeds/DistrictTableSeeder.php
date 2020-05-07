<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('districts')->insert([
            ['name'=>'Barguna', 'division_id'=>1, 'sort_id'=>1, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Barisal', 'division_id'=>1, 'sort_id'=>2, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Bhola', 'division_id'=>1, 'sort_id'=>3, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Jhalokati', 'division_id'=>1, 'sort_id'=>4, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Patuakhali', 'division_id'=>1, 'sort_id'=>5, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Pirojpur', 'division_id'=>1, 'sort_id'=>6, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],            

            ['name'=>'Bandarban', 'division_id'=>2, 'sort_id'=>1, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Brahmanbaria', 'division_id'=>2, 'sort_id'=>2, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Chandpur', 'division_id'=>2, 'sort_id'=>3, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Chattogram', 'division_id'=>2, 'sort_id'=>4, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Comilla', 'division_id'=>2, 'sort_id'=>5, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Cox\'s Bazar', 'division_id'=>2, 'sort_id'=>6, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],            
            ['name'=>'Feni', 'division_id'=>2, 'sort_id'=>7, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],            
            ['name'=>'Khagrachari', 'division_id'=>2, 'sort_id'=>8, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],            
            ['name'=>'Lakshmipur', 'division_id'=>2, 'sort_id'=>9, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],            
            ['name'=>'Noakhali', 'division_id'=>2, 'sort_id'=>10, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],            
            ['name'=>'Rangamati', 'division_id'=>2, 'sort_id'=>11, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],            

            ['name'=>'Dhaka', 'division_id'=>3, 'sort_id'=>1, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Faridpur', 'division_id'=>3, 'sort_id'=>2, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Gazipur', 'division_id'=>3, 'sort_id'=>3, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Gopalganj', 'division_id'=>3, 'sort_id'=>4, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Kishoreganj', 'division_id'=>3, 'sort_id'=>5, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Madaripur', 'division_id'=>3, 'sort_id'=>6, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],            
            ['name'=>'Manikganj', 'division_id'=>3, 'sort_id'=>7, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],            
            ['name'=>'Munshiganj', 'division_id'=>3, 'sort_id'=>8, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],            
            ['name'=>'Narayanganj', 'division_id'=>3, 'sort_id'=>9, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],            
            ['name'=>'Narsingdi', 'division_id'=>3, 'sort_id'=>10, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],            
            ['name'=>'Rajbari', 'division_id'=>3, 'sort_id'=>11, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],            
            ['name'=>'Tangail', 'division_id'=>3, 'sort_id'=>12, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],            
            ['name'=>'Shariatpur', 'division_id'=>3, 'sort_id'=>13, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],

            ['name'=>'Bagerhat', 'division_id'=>4, 'sort_id'=>1, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Chuadanga', 'division_id'=>4, 'sort_id'=>2, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Jessore', 'division_id'=>4, 'sort_id'=>3, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Jhenaidah', 'division_id'=>4, 'sort_id'=>4, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Khulna', 'division_id'=>4, 'sort_id'=>5, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Kushtia', 'division_id'=>4, 'sort_id'=>6, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],            
            ['name'=>'Magura', 'division_id'=>4, 'sort_id'=>7, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],            
            ['name'=>'Meherpur', 'division_id'=>4, 'sort_id'=>8, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],            
            ['name'=>'Narail', 'division_id'=>4, 'sort_id'=>9, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],            
            ['name'=>'Satkhira', 'division_id'=>4, 'sort_id'=>10, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],            

            ['name'=>'Jamalpur', 'division_id'=>5, 'sort_id'=>1, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Mymensingh', 'division_id'=>5, 'sort_id'=>2, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Netrokona', 'division_id'=>5, 'sort_id'=>3, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Sherpur', 'division_id'=>5, 'sort_id'=>4, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],

            ['name'=>'Bogra', 'division_id'=>6, 'sort_id'=>1, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Chapainawabganj', 'division_id'=>6, 'sort_id'=>2, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Joypurhat', 'division_id'=>6, 'sort_id'=>3, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Naogaon', 'division_id'=>6, 'sort_id'=>4, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Natore', 'division_id'=>6, 'sort_id'=>5, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Pabna', 'division_id'=>6, 'sort_id'=>6, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],            
            ['name'=>'Rajshahi', 'division_id'=>6, 'sort_id'=>7, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],            
            ['name'=>'Sirajganj', 'division_id'=>6, 'sort_id'=>8, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],            

            ['name'=>'Dinajpur', 'division_id'=>7, 'sort_id'=>1, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Gaibandha', 'division_id'=>7, 'sort_id'=>2, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Kurigram', 'division_id'=>7, 'sort_id'=>3, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Lalmonirhat', 'division_id'=>7, 'sort_id'=>4, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Nilphamari', 'division_id'=>7, 'sort_id'=>5, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Panchagarh', 'division_id'=>7, 'sort_id'=>6, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],            
            ['name'=>'Rangpur', 'division_id'=>7, 'sort_id'=>7, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],            
            ['name'=>'Thakurgaon', 'division_id'=>7, 'sort_id'=>8, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],            
            
            ['name'=>'Habiganj', 'division_id'=>8, 'sort_id'=>1, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Moulvibazar', 'division_id'=>8, 'sort_id'=>2, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Sunamganj', 'division_id'=>8, 'sort_id'=>3, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Sylhet', 'division_id'=>8, 'sort_id'=>4, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
        ]);
    }
}
