<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFudanSmallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fudan_smalls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 20)->comment('用户名');
            $table->string('phone', 30)->unique();
            $table->string('grade', 20)->nullable()->comment('班级');
            $table->string('seat', 20)->nullable()->comment('座位号');
            $table->string('user')->default('名单')->comment('录入人');
            $table->boolean('sign')->default(0)->comment('是否签到');
            $table->boolean('print')->default(0)->comment('是否手动打印');
            $table->boolean('message')->default(0)->comment('是否已经发送短信');
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
        Schema::dropIfExists('fudan_smalls');
    }
}
