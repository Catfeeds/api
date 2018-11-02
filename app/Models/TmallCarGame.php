<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TmallCarGame extends Model
{
    protected $fillable = ['path', 'score', 'tmall_car_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\TmallCar', 'tmall_car_id', 'id');
    }
}
