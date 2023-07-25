<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Relasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relasi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('lokasi')->unsigned();
            $table->timestamps();
        });

        Schema::table('relasi', function (Blueprint $table) {
         
            $table->foreign('lokasi')->references('id')->on('perusahaans')->onupdate('cascade')->ondelete('cascade');
        });
    }


    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relasi');
    }
}
