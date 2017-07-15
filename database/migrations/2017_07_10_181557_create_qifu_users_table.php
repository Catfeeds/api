<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQifuUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qifu_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('openid')->nullable();
            $table->string('nickname', 50);
            $table->string('company', 50)->default('');
//            $table->string('name', 50)->unique();
            $table->boolean('sign')->default(0);
            $table->boolean('vr')->default(0);
            $table->boolean('pasture')->default(0);
            $table->text('logo')->nullable();
            $table->text('shop_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qifu_users');
    }
}
