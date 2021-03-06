<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Bgy
 *
 * @property int $id
 * @property string $openid
 * @property string $nickname
 * @property string $avatar
 * @property int $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bgy whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bgy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bgy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bgy whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bgy whereOpenid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bgy whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bgy whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Bgy extends Model
{
    protected $guarded = ['id'];
}
