<?php

use Illuminate\Database\Seeder;

class UpgradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionTableSeeder::class);
        $this->call(RolesTableSeeder::class);
    }
}
