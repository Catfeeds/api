<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\AiaScore
 *
 * @property int $id
 * @property string $openid
 * @property int $score
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AiaScore whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AiaScore whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AiaScore whereOpenid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AiaScore whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AiaScore whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AiaScore extends Model
{
    protected $guarded = ['id'];
}
