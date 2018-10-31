<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrisoUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friso_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('openid');
            $table->string('username');
            $table->string('phone');
            $table->string('email');
            $table->string('city');
            $table->json('answer');
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
        Schema::dropIfExists('friso_users');
    }
}
