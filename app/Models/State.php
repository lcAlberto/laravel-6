<?php

namespace App\Models;

use App\City;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
//    use SoftDeletes;

    protected $fillable = [
        'name', 'abbr'
    ];

    protected $searchBy = [
        'name', 'abbr',
    ];

    protected $dates = ['deleted_at'];

    public function farms()
    {
        return $this->hasMany(State::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
