<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinfoDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businfodetails', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('busId')->index();
            $table->integer('bound');
            $table->string('lineTitle');
            $table->string('lineSiteCount');
            $table->string('lastUpTime')->nullable();
            $table->string('cityEngName')->nullable();
            $table->string('cityName')->nullable();
            $table->string('lineName')->nullable();
            $table->string('company')->nullable();
            $table->string('lineTypeName')->nullable();
            $table->string('proName')->nullable();
            $table->string('siteTitleName')->nullable();
            $table->string('runTime')->nullable();
            $table->string('price')->nullable();
            $table->string('lineSiteName');
            $table->string('lineSiteId');
            $table->string('lineSiteNum');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('businfodetail');
    }
}
