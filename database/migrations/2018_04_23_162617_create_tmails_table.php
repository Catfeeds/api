<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tmails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('openid', 100)->unique();
            $table->string('nickname');
            $table->text('avatar');
            $table->integer('oysho')->default(0);
            $table->integer('mac')->default(0);
            $table->integer('pocky')->default(0);
            $table->integer('num')->default(0)->comment('兑换数量');
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
        Schema::dropIfExists('tmails');
    }
}
