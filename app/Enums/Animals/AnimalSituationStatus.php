<?php

namespace App\Enums\Animals;

use App\Enums\Enum;

abstract class AnimalSituationStatus extends Enum
{
    const ALIVE = 'alive';
    const DEAD = 'dead';
    const SOLD = 'sold';
    const SLAUGHTERED = 'slaughtered';
}