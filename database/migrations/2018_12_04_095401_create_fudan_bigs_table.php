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
            $table->string('grade', 20)->nullable()->comment('班级');
            $table->string('phone', 20)->nullable()->comment('手机号');
            $table->string('en_name', 30)->nullable()->comment('英文名');
            $table->string('sign_h5', 10)->nullable()->comment('报名方式');
            $table->string('sign_class')->nullable()->comment('报名班级');
            $table->string('seat')->nullable()->comment('晚宴座位');
            $table->string('noon_seat')->nullable()->comment('中午座位');
            $table->string('color')->nullable()->comment('吊牌颜色');
            $table->string('user')->default('名单')->comment('录入人');
            $table->string('type')->nullable()->comment('参与类型');
            $table->boolean('sign')->default(0)->comment('是否签到');
            $table->boolean('print')->default(0)->comment('是否手动打印');
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
        Schema::dropIfExists('fudan_bigs');
    }
}
