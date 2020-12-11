<?php

namespace App;

use App\Models\State;
use Illuminate\Database\Eloquent\Model;

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