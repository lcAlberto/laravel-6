<?php


namespace App\Repositories;

use App\Enums\Animals\AnimalAgeClassificationEnum;
use App\Enums\Animals\AnimalProductionStatus;
use App\Enums\Animals\AnimalSituationStatus;
use App\Models\Animal;
use App\Repositories\Criteria\Common\Where;

class AnimalRepository extends Repository
{
    protected function getClass()
    {
        return Animal::class;
    }

    public function getMothers()
    {
        return Animal::query()
            ->where('farm_id', current_user()->farm_id)
            ->where('sex', 'femeale')
            ->where('age_classification', AnimalAgeClassificationEnum::ADULT_COW)
            ->get();
    }

    public function getFathers()
    {
        return Animal::query()
            ->where('farm_id', current_user()->farm_id)
            ->where('sex', 'male')
            ->where('age_classification', AnimalAgeClassificationEnum::REPRODUCTIVE_BULL)
            ->get();
    }

    public function getStatusSituation(): \Illuminate\Support\Collection
    {
        return collect([
            [
                'id' => 0,
                'name' => __('labels.animal.situation.' . AnimalSituationStatus::ALIVE),
                'value' => AnimalSituationStatus::ALIVE
            ], [
                'id' => 2,
                'name' => __('labels.animal.situation.' . AnimalSituationStatus::SOLD),
                'value' => AnimalSituationStatus::SOLD
            ], [
                'id' => 3,
                'name' => __('labels.animal.situation.' . AnimalSituationStatus::SLAUGHTERED),
                'value' => AnimalSituationStatus::SLAUGHTERED
            ], [
                'id' => 4,
                'name' => __('labels.animal.situation.' . AnimalSituationStatus::DEAD),
                'value' => AnimalSituationStatus::DEAD
            ],
        ]);
    }

    public function productionClassification(): \Illuminate\Support\Collection
    {
        return collect([
            [
                'id' => 0,
                'name' => __('labels.animal.production_classification.' . AnimalProductionStatus::LACTATING),
                'value' => AnimalProductionStatus::LACTATING
            ], [
                'id' => 1,
                'name' => __('labels.animal.production_classification.' . AnimalProductionStatus::NO_LACTATING),
                'value' => AnimalProductionStatus::NO_LACTATING
            ], [
                'id' => 2,
                'name' => __('labels.animal.production_classification.' . AnimalProductionStatus::PREGNANT),
                'value' => AnimalProductionStatus::PREGNANT
            ], [
                'id' => 3,
                'name' => __('labels.animal.production_classification.' . AnimalProductionStatus::DRY),
                'value' => AnimalProductionStatus::DRY
            ], [
                'id' => 4,
                'name' => __('labels.animal.production_classification.' . AnimalProductionStatus::BULL_RUFFIAN),
                'value' => AnimalProductionStatus::BULL_RUFFIAN
            ], [
                'id' => 5,
                'name' => __('labels.animal.production_classification.' . AnimalProductionStatus::BULL_REPRODUCTIVE),
                'value' => AnimalProductionStatus::BULL_REPRODUCTIVE
            ], [
                'id' => 6,
                'name' => __('labels.animal.production_classification.' . AnimalProductionStatus::BULL_CASTRATED),
                'value' => AnimalProductionStatus::BULL_CASTRATED
            ],
        ]);
    }
}