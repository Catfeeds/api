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
        $last_run_data = last($run_data['stepInfoList']); //取得最近一天的运动数据

        //解密用户数据
        $user_data = $this->mini->encryptor->decryptData($session_key, $iv, $encrypted_user);

        $user = Group_user::where('openid', $user_data['openId'])->first();

        //判断是否是新用户
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
            $users = Group_user::select('openid', 'nickname', 'avatar', 'steps')
                ->where('group_id', $share_user->group_id)
                ->orderBy('steps', 'desc')
                ->get()
                ->all();
            $users = [
                'data' => $users
            ];
            $users = array_add($users, 'user_openid', $user_data['openId']);
            return response()->json($users);
        }
        //判断老用户步数是否更新
        if ($user->steps < $last_run_data['step']) {
            $sub_step = $last_run_data['step'] - $user->steps;
            //更新用户步数
            $user->steps = $last_run_data['step'];
            $user->save();

            //同步更新群总步数
            $group = Group::find($user->group_id);
            $group->steps += $sub_step;
            $group->save();
        }
        //查询所属群里的所有用户
        $users = Group_user::select('openid', 'nickname', 'avatar', 'steps')
            ->where('group_id', $user->group_id)
            ->orderBy('steps', 'desc')
            ->get()
            ->all();
        $users = [
            'data' => $users
        ];
        $users = array_add($users, 'user_openid', $user_data['openId']);
        return response()->json($users);
    }

    public function group(Request $request)
    {
        $openid = $request->input('openid');
        //获取所属群
        $group_user = Group_user::select('group_id')
            ->where('openid', $openid)
            ->first();
        $group = Group::find($group_user->group_id);

        //获取前100个群
        $groups = Group::select('gname', 'steps', 'avatar')
            ->orderBy('steps', 'desc')
            ->limit(200)
            ->get();
        $arr = [
            'groups' => $groups->all(),
            'user_gname' => $group->gname,
            'user_steps' => $group->steps,
            'user_avatar' => $group->avatar
        ];

        return response()->json($arr);

    }
}
