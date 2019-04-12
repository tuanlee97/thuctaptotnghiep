<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Giadien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giadien', function (Blueprint $table) {
            $table->increments('mabac');
            $table->string('tenbac');
            $table->integer('tusokw');
            $table->integer('densokw');
            $table->double('dongia');
            $table->datetime('ngayapdung');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('giadien');
    }
}
