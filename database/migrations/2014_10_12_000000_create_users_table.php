<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('manv');
            $table->primary('manv');
            $table->string('tennv');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('diachi');
            $table->string('cmnd',9);
            $table->string('sdt',10);
            $table->string('hinhanh');
            $table->integer('chucvu')->unsigned();
                $table->foreign('chucvu')
                      ->references('macv')
                      ->on('chucvu')
                      ->onDelete('cascade');
            
        });
    }


    public function down()
    {
        Schema::dropIfExists('users');
    }
}
