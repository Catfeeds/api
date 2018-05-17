<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frisos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('openid',120)->unique();
            $table->string('nickname')->nullable();
            $table->string('phone')->nullable();
            $table->text('headimg')->nullable();
            $table->string('location')->nullable()->comment('场次名称');
            $table->string('reward')->nullable()->comment('获得奖品');
            $table->boolean('status')->default(false)->comment('是否核销');
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
        Schema::dropIfExists('frisos');
    }
}
