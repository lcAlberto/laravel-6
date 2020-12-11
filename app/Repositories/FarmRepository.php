<?php


namespace App\Repositories;

use App\Models\Farm;

class FarmRepository extends Repository
{
    protected function getClass()
    {
        return Farm::class;
    }
}