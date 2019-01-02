<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businfos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('bid')->nullable();
            $table->string('busno')->nullable();
            $table->integer('wheelchair');
            $table->integer('night');
            $table->integer('special');
            $table->integer('racing');
            $table->integer('airport');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('businfos');
    }
}
