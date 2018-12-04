<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFudanBigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fudan_bigs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project', 100)->nullable()->comment('项目');
            $table->string('username', 20)->comment('用户名');
            $table->string('class', 20)->nullable()->comment('班级');
            $table->string('en_name', 30)->nullable()->comment('英文名');
            $table->string('sign_h5', 10)->nullable()->comment('报名方式');
            $table->string('sign_class')->nullable()->comment('报名班级');
            $table->string('color')->nullable()->comment('吊牌颜色');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fudan_bigs');
    }
}
