<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFudansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fudans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('teacher');
            $table->string('university');
            $table->string('department')->nullable();
            $table->text('bless');
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
        Schema::dropIfExists('fudans');
    }
}
