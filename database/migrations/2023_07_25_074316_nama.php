<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Nama extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nama', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('Nama')->unsigned();
            $table->timestamps();
        });

        Schema::table('nama', function (Blueprint $table) {
         
            $table->foreign('Nama')->references('id')->on('perusahaans')->onupdate('cascade')->ondelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nama');
    }
}
