<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('openid',100)->unique();
            $table->string('phone',11)->nullable();
            $table->integer('totalScore')->default(0);
            $table->integer('totalTime')->default(0);
            $table->date('share')->nullable()->comment('分享时间');
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
        Schema::dropIfExists('aias');
    }
}
