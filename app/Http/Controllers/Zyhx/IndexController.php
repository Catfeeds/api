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

        $topic = Topic::where('enabled', true)->first();
        if (is_null($topic)) {
            return '活动主题尚未开放';
        }
        //获取点赞数最多的前三人 三十条评论
        $tops = Comment::where('topic_id', $topic->id)
            ->orderByDesc('zan')
            ->limit(3)->get();
        $comments = Comment::where('topic_id', $topic->id)
            ->orderBy('created_at')
            ->limit(30)->get();
        //该用户已点赞评论
        $zans = Zan::where('openid', $wechatInfo['id'])->get();
    }

    public function screen()
    {
        //点赞最高人和最近4位点赞人
        $topic = Topic::where('enabled', true)->first();
        if (is_null($topic)) {
            return '活动主题尚未开放';
        }
        $top = Comment::where('topic_id', $topic->id)
            ->orderBy('zan')->first();
        $comments = Comment::where('topic_id', $topic->id)
            ->orderBy('created_at')
            ->limit(30)->get();
    }
}
