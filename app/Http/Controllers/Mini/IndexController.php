<?php

namespace App\Http\Controllers\Mini;

use App\Models\Group;
use App\Models\Group_user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use EasyWeChat\Foundation\Application;

class IndexController extends Controller
{
    public $mini;

    public function __construct(Application $app)
    {
        $this->mini = $app->mini_program;
    }

    public function index(Request $request)
    {
        $iv = $request->input('iv');
        $code = $request->input('code');
        $run_iv = $request->input('run_iv');
        $encrypted_run = $request->input('encrypted_run');
        $encrypted_user = $request->input('encrypted_user');
        $share_openid = $request->input('share_openid');

        //根据code获取session_key和openid
        $res = $this->mini->sns->getSessionKey($code);
        $session_key = $res->session_key;
        $run_data = $this->mini->encryptor->decryptData($session_key, $run_iv, $encrypted_run);
        $last_run_data = last($run_data['stepInfoList']); //取得最近一天的步数

        //解密用户数据
        $user_data = $this->mini->encryptor->decryptData($session_key, $iv, $encrypted_user);

        $user = Group_user::where('openid', $user_data['openId'])->first();
        if (is_null($user)) {
            //查询分享人所属群，保存新用户数据
            $share_user = Group_user::where('openid', $share_openid)->first();
            $user = new Group_user;
            $user->openid = $user_data['openId'];
            $user->nickname = $user_data['nickName'];
            $user->avatar = $user_data['avatarUrl'];
            $user->steps = $last_run_data['step'];
            $user->group_id = $share_user->group_id;
            $user->save();

            //同步更新群总步数
            $group = Group::find($share_user->group_id);
            $group->steps += $last_run_data['step'];
            $group->save();

            //查询所属群里的所有用户
            $users = Group_user::select('openid','nickname', 'avatar', 'steps')
                ->where('group_id', $share_user->group_id)
                ->get();
            return \GuzzleHttp\json_encode($users);
        }
        return $user;
    }
}
