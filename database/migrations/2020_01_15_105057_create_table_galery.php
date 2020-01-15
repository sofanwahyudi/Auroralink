<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableGalery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galery', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('job_id')->nullable();
            $table->string('gambar')->nullable();
            $table->string('title');
            $table->string('deskripsi');
            $table->string('url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galery');
    }
}
