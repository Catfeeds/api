<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Ali
 *
 * @property int $id
 * @property string $uid
 * @property string $name
 * @property int $hours
 * @property \Carbon\Carbon|null $createdAt
 * @property \Carbon\Carbon|null $updatedAt
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ali whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ali whereHours($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ali whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ali whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ali whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ali whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property \Carbon\Carbon|null $createdAt
 * @property \Carbon\Carbon|null $updatedAt
 */
class Ali extends Model
{
    protected $guarded = ['id'];
}
