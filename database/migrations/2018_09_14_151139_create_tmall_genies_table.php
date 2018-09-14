<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTmallGeniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tmall_genies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->dateTime('end')->nullable();
            $table->integer('punish')->default(0);
            $table->json('phones');
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
        Schema::dropIfExists('tmall_genies');
    }
}
