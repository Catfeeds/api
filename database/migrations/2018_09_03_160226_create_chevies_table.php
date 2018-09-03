<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chevies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('openid', 100);
            $table->string('nickname');
            $table->text('avatar');
            $table->integer('score')->unsigned();
            $table->integer('top')->unsigned();
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
        Schema::dropIfExists('chevies');
    }
}
