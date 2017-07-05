<?php
/**
 * @resource 微信运动小程序接口
 *
 * 微信运动小程序接口API文档
 */

namespace App\Http\Controllers\Mini;

use App\Http\Requests\Mini\GroupsRequest;
use App\Http\Requests\Mini\IndexRequest;
use App\Http\Requests\Mini\SettingRequest;
use App\Models\Group;
use App\Models\Group_user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use EasyWeChat\Foundation\Application;
use Illuminate\Support\Facades\Storage;


class IndexController extends Controller
{
    public $mini;

    public function __construct(Application $app)
    {
        $this->mini = $app->mini_program;
    }

    /**
     *微信程序初始化接口
     *
     * @param IndexRequest $request
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function index(IndexRequest $request)
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
            $users = Group_user::select('openid', 'nickname', 'avatar', 'steps', 'zan')
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
        $users = Group_user::select('openid', 'nickname', 'avatar', 'steps', 'zan')
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

    /**
     * 微信运动群间PK接口
     *
     * @param GroupsRequest $request
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function group(GroupsRequest $request)
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

    /**
     * 群设置接口
     *
     * 返回群设置信息和用户类型（是否是群主）
     *
     * @param GroupsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function setting_info(GroupsRequest $request)
    {
        $openid = $request->input('openid');
        //获取所属群
        $group_user = Group_user::where('openid', $openid)->first();
        $group = Group::find($group_user->group_id);

        $arr = [
            'avatar' => $group->avatar,
            'gname' => $group->gname,
            'step_aim' => $group->step_aim,
            'introduction' => $group->introduction,
            'is_leader' => $group_user->is_leader
        ];
        return response()->json($arr);
    }

    /**
     * 保存群设置接口
     *
     *
     * @param SettingRequest $request
     * @return string
     */
    public function setting(SettingRequest $request)
    {
        $openid = $request->input('openid');
        $avatar = $request->file('avatar');
        $gname = $request->input('gname');
        $introduction = $request->input('introduction');
        $step_aim = $request->input('step_aim');

        //获取所属群
        $group_user = Group_user::select('group_id')
            ->where('openid', $openid)
            ->first();
        $group = Group::find($group_user->group_id);
        //判断是否修改了群头像
        if (!is_null($avatar)){
            $path = Storage::disk('public_path')->putFile('mini', $avatar);
            $path = env('APP_URL').'/'.$path;
            $group->avatar = $path;
        }
        $group->step_aim = $step_aim;
        $group->introduction = $introduction;
        $group->gname = $gname;
        $group->save();

        return 'true';
    }
}
