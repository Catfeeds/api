<?php

namespace App\Http\Controllers\Zyhx;

use App\Models\Comment;
use App\Models\Topic;
use App\Models\Zan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function phoneIndex()
    {
        $wechatInfo = session('wechat.oauth_user');

        $topic = Topic::where('enabled', true)
            ->orderBy('created_at', 'desc')
            ->first();

        if (is_null($topic)) {
            return '活动主题尚未开放';
        }
        //获取点赞数最多的前十条评论
        $comments = Comment::where('topic_id', $topic->id)
            ->orderByDesc('zan')
            ->limit(10)->get();
        //该用户已点赞评论
        $zans = Zan::where('openid', $wechatInfo['id'])->get();
    }

    public function screen()
    {
        $topic = Topic::where('enabled', true)
            ->orderBy('created_at', 'desc')
            ->first();
        if (is_null($topic)) {
            return '活动主题尚未开放';
        }

        $comments = Comment::where('topic_id', $topic->id)
            ->where('check', '1')
            ->orderByDesc('created_at')
            ->limit(10)
            ->get();

        return view('zyhx.index', compact('comments'));
    }
}
