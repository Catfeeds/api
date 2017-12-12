<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBgiesTable extends Migration
{
    /**
     * Run the migrations.
     * 天麓府项目，保存用户头像地址
     * @return void
     */
    public function up()
    {
        Schema::create('bgies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('openid', 100)->unique();
            $table->string('nickname',20);
            $table->string('phone',11);
            $table->string('name',20);
            $table->string('avatar',200);
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('bgies');
    }
}
