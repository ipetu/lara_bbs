<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinfoMoreBusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('morebusinfos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('busno')->index();
            $table->string('busId')->index();
            $table->string('busLineName')->unique();
            $table->string('busLineTypeName');
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
        Schema::dropIfExists('morebusinfos');
    }
}
