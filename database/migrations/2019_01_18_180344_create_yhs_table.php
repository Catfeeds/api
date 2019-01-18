<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yhs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('openid', 100)->unique();
            $table->text('avatar');
            $table->string('nickname');
            $table->boolean('status')->default(0)->comment('是否中奖');
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
        Schema::dropIfExists('yhs');
    }
}
