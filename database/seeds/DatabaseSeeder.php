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
        $this->call(StateTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(BreedsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionTableSeeder::class);

        $this->call(UserTableSeeder::class);
        $this->call(FarmTableSeeder::class);
        $this->call(AnimalTableSeeder::class);
    }
}
