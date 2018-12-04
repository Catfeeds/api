<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFudanLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fudan_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 30);
            $table->string('grade', 20)->nullable()->comment('班级');
            $table->string('type')->comment('签到类型');
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
        Schema::dropIfExists('fudan_logs');
    }
}
