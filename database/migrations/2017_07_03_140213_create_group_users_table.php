<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('openid',150)->unique();
            $table->text('avatar')->nullable();
            $table->string('nickname', 50);
            $table->mediumInteger('steps')->default(0);
            $table->boolean('is_leader')->default(0);
            $table->mediumInteger('zan')->default(0);
            $table->integer('group_id')->unsigned();

            $table->foreign('group_id')->references('id')->on('groups');
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
        Schema::dropIfExists('group_users');
    }
}
