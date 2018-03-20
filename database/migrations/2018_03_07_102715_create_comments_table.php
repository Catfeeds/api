<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * 中远恒信现场问答互动评论
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('openid', 120);
            $table->string('nickname', 50);
//            $table->text('headimgurl')->comment('头像');
            $table->text('comment')->comment('评论和问题内容');
            $table->integer('zan')->default(0);
            $table->boolean('check')->default('0')->comment('是否审核');
            $table->integer('topic_id')->unsigned();
            $table->foreign('topic_id')->references('id')->on('topics');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
