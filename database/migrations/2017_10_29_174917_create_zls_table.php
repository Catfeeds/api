<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('openid', 100)->unique();
            $table->string('nickname',50);
            $table->string('name',10);
            $table->string('phone',11)->unique();
            $table->text('avatar');
            $table->boolean('unofficially')->default(0)
                ->comment('是否内定');
            $table->boolean('prize')->default(0)
                ->comment('是否中奖');
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
        Schema::dropIfExists('zls');
    }
}
