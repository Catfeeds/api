<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCowinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cowins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('openid', 100);
            $table->string('nickname',100);
            $table->string('phone', 11);
            $table->text('avatar');
            $table->text('greeting')->comment('贺卡');
            $table->boolean('status')->default(0)->comment('是否下载');
            $table->boolean('confirm')->default(0)->comment('是否确认手机号');
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
        Schema::dropIfExists('cowins');
    }
}
