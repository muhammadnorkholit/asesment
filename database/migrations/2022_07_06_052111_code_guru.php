<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CodeGuru extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('code_guru', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->bigInteger('guru_id')->unsigned();
            $table->bigInteger('mapel_id')->unsigned();
            $table->foreign('guru_id')->references('id')->on('guru')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('code_guru');
    }
}
