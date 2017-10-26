<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHx2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hx2s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',10);
            $table->string('phone',20);
            $table->string('company',20);
            $table->boolean('check')->default(0)->comment('是否审核');
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
        Schema::dropIfExists('hx2s');
    }
}
