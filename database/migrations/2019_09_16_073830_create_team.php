<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('nik')->nullable();
            $table->string('foto')->nullable();
            $table->string('nama')->nullable();
            $table->string('alamat')->nullable();
            $table->string('email')->nullable();
            $table->string('telepon')->nullable();
            $table->integer('bagian_id')->unsigned();
            $table->integer('devisi_id')->unsigned();
        });
        Schema::create('devisi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('keterangan');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team');
        Schema::dropIfExists('devisi');
    }
}
