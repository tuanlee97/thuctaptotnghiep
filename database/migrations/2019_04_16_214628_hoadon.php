<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Hoadon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('hoadon', function (Blueprint $table) {
           $table->string('mahd');
            $table->primary('mahd');
            $table->string('ky');
            $table->datetime('ngaylap');
             $table->double('tongtien');
            $table->boolean('trangthai')->default(0);

            $table->string('makh');
                $table->foreign('makh')
                      ->references('makh')
                      ->on('khachhang')
                      ->onDelete('cascade');
            $table->string('manv');
                $table->foreign('manv')
                      ->references('manv')
                      ->on('users')
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
         Schema::dropIfExists('hoadon');
    }
}
