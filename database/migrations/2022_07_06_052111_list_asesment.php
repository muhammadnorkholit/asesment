<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ListAsesment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_asesment', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('mapel_id')->unsigned();
            $table->string('list',100);
            $table->foreign('mapel_id')->references('id')->on('mapel')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_asesment');
    }
}
