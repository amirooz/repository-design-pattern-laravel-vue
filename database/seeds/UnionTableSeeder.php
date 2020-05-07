<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unions')->insert([

            // Barisal Division -- Barguna District -- Amtali Upazilla
            ['name'=>'Amtoli', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>1, 'sort_id'=>1, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Arapangasiya', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>1, 'sort_id'=>2, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Atharagachiya', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>1, 'sort_id'=>3, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Chaoda', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>1, 'sort_id'=>4, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Chotabagi', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>1, 'sort_id'=>5, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Gulisakhali', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>1, 'sort_id'=>6, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Haldia', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>1, 'sort_id'=>7, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Kukuya', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>1, 'sort_id'=>8, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],

            // Barisal Division -- Barguna District -- Bamna Upazilla
            ['name'=>'Bamna', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>2, 'sort_id'=>1, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Bukabunia', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>2, 'sort_id'=>2, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Douwatola', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>2, 'sort_id'=>3, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Ramna', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>2, 'sort_id'=>4, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],

            // Barisal Division -- Barguna District -- Barguna Upazilla
            ['name'=>'Ayla Patakata', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>3, 'sort_id'=>1, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Badarkhali', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>3, 'sort_id'=>2, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Barguna', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>3, 'sort_id'=>3, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Burirchar', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>3, 'sort_id'=>4, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Dhaluya', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>3, 'sort_id'=>5, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Fuljhuri', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>3, 'sort_id'=>6, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Gauricanna', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>3, 'sort_id'=>7, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Keorabuniya', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>3, 'sort_id'=>8, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'M. Baliyatali', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>3, 'sort_id'=>9, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Noltona', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>3, 'sort_id'=>10, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],

            // Barisal Division -- Barguna District -- Betagi Upazilla
            ['name'=>'Betagi', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>4, 'sort_id'=>1, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Bibicin', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>4, 'sort_id'=>2, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Buramajumadar', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>4, 'sort_id'=>3, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Hosanabhad', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>4, 'sort_id'=>4, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Kazirabhad', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>4, 'sort_id'=>5, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Mkamiya', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>4, 'sort_id'=>6, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Sarisamuri', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>4, 'sort_id'=>7, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],

            // Barisal Division -- Barguna District -- Patharghata Upazilla
            ['name'=>'Charduyani', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>5, 'sort_id'=>1, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Kakchira', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>5, 'sort_id'=>2, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Kalamegha', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>5, 'sort_id'=>3, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'kathaltoli', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>5, 'sort_id'=>4, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Nachanapara', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>5, 'sort_id'=>5, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Patharghata', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>5, 'sort_id'=>6, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Rayhanpur', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>5, 'sort_id'=>7, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],

            // Barisal Division -- Barguna District -- Taltoli Upazilla
            ['name'=>'Borobogi', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>6, 'sort_id'=>1, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Chotobogi', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>6, 'sort_id'=>2, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Koroibaria', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>6, 'sort_id'=>3, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Nishanbaria', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>6, 'sort_id'=>4, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Pochakoralia', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>6, 'sort_id'=>5, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Sharickhali', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>6, 'sort_id'=>6, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Sonakata', 'division_id'=>1, 'district_id'=>1, 'upazilla_id'=>6, 'sort_id'=>7, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],

            // Rangpur Division -- Panchagarh District -- Atwari Upazilla
            ['name'=>'Aloyakhoya', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>434, 'sort_id'=>1, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Balrampur', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>434, 'sort_id'=>2, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Dhamor', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>434, 'sort_id'=>3, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Mirzapur', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>434, 'sort_id'=>4, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Radhanagar', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>434, 'sort_id'=>5, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Tohriya', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>434, 'sort_id'=>6, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],

            // Rangpur Division -- Panchagarh District -- Bhora Upazilla
            ['name'=>'Benghari', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>435, 'sort_id'=>1, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'bhora', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>435, 'sort_id'=>2, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Boroshashi', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>435, 'sort_id'=>3, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Chandanbari', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>435, 'sort_id'=>4, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Jhalaisal Shiri', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>435, 'sort_id'=>5, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Kajaldighi Kaliganj', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>435, 'sort_id'=>6, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Maidan Dighi', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>435, 'sort_id'=>7, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Mareya Bamanhat', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>435, 'sort_id'=>8, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Pachphir', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>435, 'sort_id'=>9, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Sakoya', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>435, 'sort_id'=>10, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],

            // Rangpur Division -- Panchagarh District -- Deviganj Upazilla
            ['name'=>'Chengthi Hazra Danga', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>436, 'sort_id'=>1, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Chilahati', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>436, 'sort_id'=>2, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Dhandhopal', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>436, 'sort_id'=>3, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Deviduba', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>436, 'sort_id'=>4, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Deviganj Headquarters', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>436, 'sort_id'=>5, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Pamuli', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>436, 'sort_id'=>6, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Shaldanga', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>436, 'sort_id'=>7, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Sonahar Mallikdhah', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>436, 'sort_id'=>8, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Sundaradighi', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>436, 'sort_id'=>9, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Tepriganj', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>436, 'sort_id'=>10, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],

            // Rangpur Division -- Panchagarh District -- Panchagarh Sadar Upazilla
            ['name'=>'Amarkhana', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>437, 'sort_id'=>1, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Chaklahat', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>437, 'sort_id'=>2, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Dhakkamara', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>437, 'sort_id'=>3, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Gharinabari', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>437, 'sort_id'=>4, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Haribhasa', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>437, 'sort_id'=>5, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Hafizabhad', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>437, 'sort_id'=>6, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Kamat Kajal Dighi', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>437, 'sort_id'=>7, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Magura', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>437, 'sort_id'=>8, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Panchagarh Sadar', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>437, 'sort_id'=>9, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Satmera', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>437, 'sort_id'=>10, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],

            // Rangpur Division -- Panchagarh District -- Tetulia Upazilla
            ['name'=>'Banglabandha', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>438, 'sort_id'=>1, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Bhajonpur', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>438, 'sort_id'=>2, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Buraburi', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>438, 'sort_id'=>3, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Devnagar', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>438, 'sort_id'=>4, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Salbahan', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>438, 'sort_id'=>5, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Tetulia', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>438, 'sort_id'=>6, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Tirnoihat', 'division_id'=>7, 'district_id'=>58, 'upazilla_id'=>438, 'sort_id'=>7, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            
            // Rajshahi Division -- Pabna District -- Atgharia Upazilla
            ['name'=>'Chadva', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>367, 'sort_id'=>1, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Devottar', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>367, 'sort_id'=>2, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Ekdhanto', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>367, 'sort_id'=>3, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Lakshmipur', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>367, 'sort_id'=>4, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Majpara', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>367, 'sort_id'=>5, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            
            // Rajshahi Division -- Pabna District -- Bhangra Upazilla
            ['name'=>'Astamanisa', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>368, 'sort_id'=>1, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Bhangura', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>368, 'sort_id'=>2, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Dilpasara', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>368, 'sort_id'=>3, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'khanmarich', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>368, 'sort_id'=>4, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Parbhangura', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>368, 'sort_id'=>5, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],

            // Rajshahi Division -- Pabna District -- Chatmohar Upazilla
            ['name'=>'Bilchalan', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>369, 'sort_id'=>1, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Chaikola', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>369, 'sort_id'=>2, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Datia Bamangram', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>369, 'sort_id'=>3, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Gunaigacha', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>369, 'sort_id'=>4, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Handiyal', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>369, 'sort_id'=>5, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Haripur', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>369, 'sort_id'=>6, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Mothurapur', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>369, 'sort_id'=>7, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Mulgrama', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>369, 'sort_id'=>8, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Nimaichara', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>369, 'sort_id'=>9, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Parshadanga', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>369, 'sort_id'=>10, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Phailjana', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>369, 'sort_id'=>11, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],

            // Rajshahi Division -- Pabna District -- Faridpur Upazilla
            ['name'=>'Banowarinagar', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>370, 'sort_id'=>1, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Brlahiribari', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>370, 'sort_id'=>2, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Demra', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>370, 'sort_id'=>3, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Faridpur', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>370, 'sort_id'=>4, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Hadal', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>370, 'sort_id'=>5, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Punguli', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>370, 'sort_id'=>6, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
           
            // Rajshahi Division -- Pabna District -- Bera Upazilla
            ['name'=>'Chakla', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>371, 'sort_id'=>1, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Dhalar Char', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>371, 'sort_id'=>2, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Haturiya Nakaliya', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>371, 'sort_id'=>3, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Jatsakhini', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>371, 'sort_id'=>4, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'koytola', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>371, 'sort_id'=>5, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Masumdiya', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>371, 'sort_id'=>6, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Notun Bharenga', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>371, 'sort_id'=>7, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Puran bharenga', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>371, 'sort_id'=>8, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Ruppur', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>371, 'sort_id'=>9, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],

            // Rajshahi Division -- Pabna District -- Ishwardi Upazilla
            ['name'=>'Chalimpur', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>372, 'sort_id'=>1, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Dasuria', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>372, 'sort_id'=>2, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Lakkhikunda', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>372, 'sort_id'=>3, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Muladuli', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>372, 'sort_id'=>4, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Pakshi', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>372, 'sort_id'=>5, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Sahapur', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>372, 'sort_id'=>6, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Shada', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>372, 'sort_id'=>7, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],

            // Rajshahi Division -- Pabna District -- Pabna Sadar Upazilla
            ['name'=>'Ataikula', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>373, 'sort_id'=>1, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Bhadara', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>373, 'sort_id'=>2, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Chartarapur', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>373, 'sort_id'=>3, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Dapuniya', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>373, 'sort_id'=>4, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Dogachi', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>373, 'sort_id'=>5, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Gayeshpur', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>373, 'sort_id'=>6, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Hemayetpur', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>373, 'sort_id'=>7, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Malanci', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>373, 'sort_id'=>8, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Maligacha', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>373, 'sort_id'=>9, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Sadullapur', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>373, 'sort_id'=>10, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],

            // Rajshahi Division -- Pabna District -- Shathia Upazilla
            ['name'=>'Bhulbariya', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>374, 'sort_id'=>1, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Dhopadaha', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>374, 'sort_id'=>2, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Dhulauri', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>374, 'sort_id'=>3, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Gourigram', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>374, 'sort_id'=>4, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Karmoja', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>374, 'sort_id'=>5, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Kashinathpur', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>374, 'sort_id'=>6, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Khetupara', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>374, 'sort_id'=>7, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Nagdemra', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>374, 'sort_id'=>8, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Nandanpur', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>374, 'sort_id'=>9, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'R-Ataikula', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>374, 'sort_id'=>10, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],

            // Rajshahi Division -- Pabna District -- Suja Nagar Upazilla
            ['name'=>'Ahammadpur', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>375, 'sort_id'=>1, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Bhayna', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>375, 'sort_id'=>2, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Dulai', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>375, 'sort_id'=>3, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Hatkhali', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>375, 'sort_id'=>4, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Manikhat', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>375, 'sort_id'=>5, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Najirganj', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>375, 'sort_id'=>6, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Raninagar', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>375, 'sort_id'=>7, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Sagarkandi', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>375, 'sort_id'=>8, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Satbariya', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>375, 'sort_id'=>9, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],
            ['name'=>'Tatibanda', 'division_id'=>6, 'district_id'=>50, 'upazilla_id'=>375, 'sort_id'=>10, 'created_at'=>date("Y-m-d H:i:s"), 'updated_at'=>date("Y-m-d H:i:s"), 'created_by'=>1, 'updated_by'=>1],



        ]);
    }
}
