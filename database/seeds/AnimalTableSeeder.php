<?php

use Illuminate\Database\Seeder;

class AnimalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");

        $model = new \App\Models\Animal();

        $animals = $model->create(
            [
                'code' => 1,
                'name' => 'Filó',
                'born_date' => $now,
                'age_classification' => \App\Enums\Animals\AnimalAgeClassificationEnum::ADULT_COW,
                'sex' => \App\Enums\Animals\AnimalSexEnum::FEMEALE,
                'production_classification' => \App\Enums\Animals\AnimalProductionStatus::LACTATING,
                'situation_status' => \App\Enums\Animals\AnimalSituationStatus::ALIVE,
                'breed' => 'Jersey',
                'thumbnail' => 'Filó.jpg',
                'mother_id' => null,
                'father_id' => null,
                'farm_id' => 1,
                'responsible_id' => 1,
            ],
            [
                'code' => 2,
                'name' => 'Bola',
                'born_date' => $now,
                'age_classification' => \App\Enums\Animals\AnimalAgeClassificationEnum::ADULT_COW,
                'sex' => \App\Enums\Animals\AnimalSexEnum::FEMEALE,
                'production_classification' => \App\Enums\Animals\AnimalProductionStatus::LACTATING,
                'situation_status' => \App\Enums\Animals\AnimalSituationStatus::ALIVE,
                'breed' => 'Jersey',
                'thumbnail' => 'Bola.jpg',
                'mother_id' => null,
                'father_id' => null,
                'farm_id' => 1,
                'responsible_id' => 1,
            ]
        );
    }
}
