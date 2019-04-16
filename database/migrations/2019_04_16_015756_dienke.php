<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Dienke extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dienke', function (Blueprint $table) {
           $table->string('madk');
            $table->primary('madk');
            $table->string('tendk');
            $table->datetime('ngaysx');
            $table->timestamp('ngaylap')->nullable()->default(null);
            $table->string('trangthai')->default(0);
            $table->string('makh')->nullable()->default(null);
                $table->foreign('makh')
                      ->references('makh')
                      ->on('khachhang')
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
       Schema::dropIfExists('dienke');
    }
}
