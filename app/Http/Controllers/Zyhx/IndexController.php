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
//        dd($wechatInfo);
        $topic = Topic::where('enabled', '1')
            ->orderBy('created_at', 'desc')
            ->first();
//
//        if (is_null($topic)) {
//            return '活动主题尚未开放';
//        }
        //获取点赞数最多的评论
        $comments = Comment::where('topic_id', $topic->id)
            ->where('check', '1')
            ->orderBy('created_at', 'desc')
            ->limit(100)->get();
        //该用户已点赞评论
        $zans = Zan::where('openid', $wechatInfo['id'])->get();

        return view('zyhx.phone', compact('topic', 'zans', 'comments', 'wechatInfo'));
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
            ->orderByDesc('zan')
            ->limit(5)
            ->get();

        return view('zyhx.index', compact('comments', 'topic'));
    }
}
