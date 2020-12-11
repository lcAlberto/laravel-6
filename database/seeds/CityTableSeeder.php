<?php

use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");

        DB::table("cities")->insert([
            [
                "id" => 1,
                "name" => "Inácio Martins",
                "state_id" => 16,
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "id" => 2,
                "name" => "Guarapuava",
                "state_id" => 16,
                "created_at" => $now,
                "updated_at" => $now,
            ]
        ]);
    }
}
