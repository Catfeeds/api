<?php

namespace App\Http\Controllers\Zyhx;

use App\Models\Comment;
use App\Models\Zan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function getComments(Request $request)
    {
        $finalId = $request->finalId;
        $commets = Comment::select(['id', 'comment'])
            ->where('check', '1')
            ->where('id','>', $finalId)
            ->orderBy('created_at')
            ->get();

        return response()->json($commets->all());
    }

    public function comment(Request $request)
    {
        $openid =$request->openid;
        $text = $request->text;
        $topic_id = $request->topic;
        $comment = new Comment();
        $comment->comment= $text;
        $comment->openid=$openid;
        $comment->topic_id = $topic_id;
        $comment->save();
        return 'true';
    }

    public function zan(Request $request)
    {
        $openid =$request->openid;
        $commentId = $request->commentId;
        $zan = new Zan();
        $zan->openid = $openid;
        $zan->comment_id = $commentId;
        $zan->save();
        return 'true';
    }
}
