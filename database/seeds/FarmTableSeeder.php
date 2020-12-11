<?php

use App\Models\Farm;
use Illuminate\Database\Seeder;

class FarmTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");
        $farm = Farm::firstOrNew([
            'name' => 'Fazenda 01'
        ]);

        $farm->fill([
            'id' => 1,
            'name' => 'Fazenda 01',
            'cep' => '85155-000',
            'city_id' => 2,
            'state_id' => 16,
            "created_at" => $now,
            "updated_at" => $now,
        ]);

        $farm->save();
    }
}
