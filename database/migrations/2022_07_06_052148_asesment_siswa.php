<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AsesmentSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asesment_siswa', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('list_id')->unsigned();
            $table->bigInteger('siswa_id')->unsigned();
            $table->boolean('list_check');
            $table->foreign('siswa_id')->references('id')->on('siswa')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('list_id')->references('id')->on('list_asesment')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asesment_siswa');
    }
}
