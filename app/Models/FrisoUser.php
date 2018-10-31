<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FrisoUser extends Model
{
    protected $fillable = ['username', 'email', 'openid', 'phone', 'city', 'answer'];
}
