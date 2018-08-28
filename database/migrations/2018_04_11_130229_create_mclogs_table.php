<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMclogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mclogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('openid');
            $table->string('type');
            $table->string('handle');
            $table->integer('coin');
            $table->integer('num')->comment('礼品兑换时的数量');
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
        Schema::dropIfExists('mclogs');
    }
}
