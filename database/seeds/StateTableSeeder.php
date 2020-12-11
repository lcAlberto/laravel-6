<?php

use Illuminate\Database\Seeder;
use App\Models\State;
use Illuminate\Support\Facades\DB;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $now = date("Y-m-d H:i:s");

        DB::table("states")->insert([
            [
                "id" => 1,
                "name" => "Acre",
                "abbr" => "AC",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "id" => 2,
                "name" => "Alagoas",
                "abbr" => "AL",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "id" => 3,
                "name" => "Amapá",
                "abbr" => "AP",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "id" => 4,
                "name" => "Amazonas",
                "abbr" => "AM",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "id" => 5,
                "name" => "Bahia",
                "abbr" => "BA",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "id" => 6,
                "name" => "Ceará",
                "abbr" => "CE",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "id" => 7,
                "name" => "Distrito Federal",
                "abbr" => "DF",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "id" => 8,
                "name" => "Espitrito Santo",
                "abbr" => "ES",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "id" => 9,
                "name" => "Goiás",
                "abbr" => "GO",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "id" => 10,
                "name" => "Maranhão",
                "abbr" => "MA",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "id" => 11,
                "name" => "Mato Grosso",
                "abbr" => "MT",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "id" => 12,
                "name" => "Mato Grosso do Sul",
                "abbr" => "MS",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "id" => 13,
                "name" => "Minas Gerais",
                "abbr" => "MG",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "id" => 14,
                "name" => "Pará",
                "abbr" => "PA",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "id" => 15,
                "name" => "Paraíba",
                "abbr" => "PB",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "id" => 16,
                "name" => "Paraná",
                "abbr" => "PR",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "id" => 17,
                "name" => "Pernanbuco",
                "abbr" => "PE",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "id" => 18,
                "name" => "Piauí",
                "abbr" => "PI",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "id" => 19,
                "name" => "Rio de Janeiro",
                "abbr" => "RJ",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "id" => 20,
                "name" => "Rio grande do Norte",
                "abbr" => "RN",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "id" => 21,
                "name" => "Rio grande do Sul",
                "abbr" => "RS",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "id" => 22,
                "name" => "Rondônia",
                "abbr" => "RO",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "id" => 23,
                "name" => "Roraima",
                "abbr" => "RR",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "id" => 24,
                "name" => "Santa Catarina",
                "abbr" => "SC",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "id" => 25,
                "name" => "São Paulo",
                "abbr" => "SP",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "id" => 26,
                "name" => "Sergipe",
                "abbr" => "SE",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "id" => 27,
                "name" => "Tocantins",
                "abbr" => "TO",
                "created_at" => $now,
                "updated_at" => $now,
            ],
        ]);
    }
}
