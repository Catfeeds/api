<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFollow\Traits\CanBeLiked;

class Group_user extends Model
{
    use CanBeLiked;

    protected $guarded = ['id'];

}
