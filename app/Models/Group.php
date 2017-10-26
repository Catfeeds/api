<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Group
 *
 * @property int $id
 * @property string $gname
 * @property string|null $avatar
 * @property int $steps
 * @property int $step_aim
 * @property string $introduction
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Group whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Group whereGname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Group whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Group whereIntroduction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Group whereStepAim($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Group whereSteps($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Group whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Group extends Model
{
    protected $guarded = ['id'];
}
