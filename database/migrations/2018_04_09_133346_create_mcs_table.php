<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mcs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('openid', 100)->unique();
            $table->string('username')->nullable();
            $table->string('phone',11)->nullable();
            $table->string('intention')->nullable()->comment('购车意向');
            $table->integer('coin')->default(0)->comment('积分');
            $table->boolean('sign')->default(0)->comment('签到');
            $table->boolean('discover')->default(0)->comment('寻宝');
            $table->boolean('ar')->default(0)->comment('AR');
            $table->boolean('car')->default(0)->comment('car');
            $table->boolean('show')->default(0)->comment('自我秀');
            $table->integer('top_score')->default(-1)->comment('游戏最高分');
            $table->integer('last_score')->default(-1)->comment('上次游戏积分');
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
        Schema::dropIfExists('mcs');
    }
}
