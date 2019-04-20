<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Chitiethd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cthoadon', function (Blueprint $table) {
           $table->string('idchitiet');
            $table->primary('idchitiet');
            $table->datetime('tungay');
            $table->datetime('denngay');
            $table->double('csdau');
            $table->double('cscuoi');
            $table->double('tamtinh');
            $table->double('thue');
            $table->double('tongthanhtien');
            $table->double('dntt');
            
            $table->string('mahd');
                $table->foreign('mahd')
                      ->references('mahd')
                      ->on('hoadon')
                      ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('cthoadon');
    }
}
