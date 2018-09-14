<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePingAnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ping_ans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('company');
            $table->string('phone');
            $table->string('email');
            $table->enum('type', ['短信','邮件'])->default('短信');
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
        Schema::dropIfExists('ping_ans');
    }
}
