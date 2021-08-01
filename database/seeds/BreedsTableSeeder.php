<?php

use Illuminate\Database\Seeder;

class BreedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");

        DB::table("breeds")->insert([
            [
                "name" => "Jersey",
                "created_at" => $now,
                "updated_at" => $now,
            ],[
                "name" => "Nelore",
                "created_at" => $now,
                "updated_at" => $now,
            ],[
                "name" => "Zebu",
                "created_at" => $now,
                "updated_at" => $now,
            ],[
                "name" => "Guzera",
                "created_at" => $now,
                "updated_at" => $now,
            ],[
                "name" => "Sindi",
                "created_at" => $now,
                "updated_at" => $now,
            ],[
                "name" => "Pardo Suiço",
                "created_at" => $now,
                "updated_at" => $now,
            ],[
                "name" => "Holandesa",
                "created_at" => $now,
                "updated_at" => $now,
            ],[
                "name" => "Gir Leiteiro",
                "created_at" => $now,
                "updated_at" => $now,
            ],[
                "name" => "Girolando",
                "created_at" => $now,
                "updated_at" => $now,
            ],[
                "name" => "Mestiça",
                "created_at" => $now,
                "updated_at" => $now,
            ],[
                "name" => "Outra",
                "created_at" => $now,
                "updated_at" => $now,
            ],
        ]);
    }
}
