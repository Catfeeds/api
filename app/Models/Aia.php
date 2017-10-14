<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Aia
 *
 * @property int $id
 * @property string $openid
 * @property string|null $phone
 * @property int $totalScore
 * @property int $totalTime
 * @property \Carbon\Carbon|null $createdAt
 * @property \Carbon\Carbon|null $updatedAt
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Aia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Aia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Aia whereOpenid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Aia wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Aia whereTotalScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Aia whereTotalTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Aia whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Aia extends Model
{
    protected $guarded = ['id'];
}
