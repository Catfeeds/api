<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Qifu_user
 *
 * @property int $id
 * @property string|null $openid
 * @property string $nickname
 * @property int $sign
 * @property int $vr
 * @property int $pasture
 * @property string|null $logo
 * @property string|null $shopUrl
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Qifu_user whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Qifu_user whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Qifu_user whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Qifu_user whereOpenid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Qifu_user wherePasture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Qifu_user whereShopUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Qifu_user whereSign($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Qifu_user whereVr($value)
 * @mixin \Eloquent
 * @property string|null $shopUrl
 */
class Qifu_user extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;
}
