<?php

namespace App\Repositories;

use App\Models\State;

class StateRepository extends Repository
{

    protected function getClass()
    {
        return State::class;
    }

    public function getcolluns($allStates)
    {
        $data = [
            'abbr' => data_get($allStates, 'abbr'),
            'name' => data_get($allStates, 'name'),
        ];
        return $data;
    }
}