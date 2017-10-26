<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFollow\Traits\CanBeLiked;


/**
 * App\Models\Group_user
 *
 * @property int $id
 * @property string $openid
 * @property string|null $avatar
 * @property string $nickname
 * @property int $steps
 * @property int $is_leader
 * @property int $zan
 * @property int $group_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Group_user[] $likers
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Group_user whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Group_user whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Group_user whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Group_user whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Group_user whereIsLeader($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Group_user whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Group_user whereOpenid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Group_user whereSteps($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Group_user whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Group_user whereZan($value)
 * @mixin \Eloquent
 */
class Group_user extends Model
{
    use CanBeLiked;

    protected $guarded = ['id'];

}
