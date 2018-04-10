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
            $table->string('username');
            $table->string('phone',11)->unique();
            $table->string('intention')->comment('购车意向');
            $table->integer('coin')->default(0)->comment('积分');
            $table->boolean('sign')->default(0)->comment('签到');
            $table->boolean('discover')->default(0)->comment('寻宝');
            $table->boolean('ar')->default(0)->comment('AR');
            $table->boolean('car')->default(0)->comment('car');
            $table->boolean('show')->default(0)->comment('自我秀');
            $table->boolean('gift1')->default(0);
            $table->boolean('gift2')->default(0);
            $table->boolean('gift3')->default(0);
            $table->boolean('gift4')->default(0);
            $table->boolean('gift5')->default(0);
            $table->boolean('gift6')->default(0);
            $table->boolean('gift7')->default(0);
            $table->boolean('gift8')->default(0);
            $table->boolean('gift9')->default(0);
            $table->boolean('gift10')->default(0);
            $table->boolean('gift11')->default(0);
            $table->boolean('gift12')->default(0);
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
