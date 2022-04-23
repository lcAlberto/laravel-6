<?php

namespace App\Models\Shared;

use Illuminate\Database\Eloquent\Model;

class Breeds extends Model
{
    protected $fillable = ['id', 'name'];

    protected $searchBy = ['name'];
}
