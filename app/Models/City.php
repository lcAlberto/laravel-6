<?php

namespace App\Models;

use App\Models\State;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'name',
    ];

    protected $dates = ['deleted_at'];

    public function state()
    {
        return $this->hasOne(State::class);
    }

    public function farms()
    {
        return $this->hasMany(User::class);
    }
}