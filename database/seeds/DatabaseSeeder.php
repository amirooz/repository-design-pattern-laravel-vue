<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionTableSeeder::class,
            CreateAdminUserSeeder::class,
            MahanagarTableSeeder::class,
            DivisionTableSeeder::class,
            DistrictTableSeeder::class,
            UpazillaTableSeeder::class,
            UnionTableSeeder::class,
            MemberTableSeeder::class,
        ]);
    }
}
