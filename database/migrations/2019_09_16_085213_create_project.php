<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('kode_project',25)->nullable();
            $table->string('nama')->nullable();
            $table->text('deskripsi')->nullable();
            $table->integer('job_id')->nullable();
            $table->integer('jasa_id')->nullable();
            $table->string('tgl_mulai')->nullable();
            $table->string('tgl_selesai')->nullable();
            $table->string('status')->default('rencana');
            $table->double('harga_penawaran');
            $table->double('harga_kesepakatan');
            $table->integer('users_id')->nullable();
            $table->integer('team_id')->nullable();
        });
        Schema::create('job', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('nama')->nullable();
            $table->text('deskripsi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project');
        Schema::dropIfExists('job');
    }
}
