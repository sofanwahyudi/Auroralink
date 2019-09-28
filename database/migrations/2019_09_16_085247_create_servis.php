<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('users_id')->nullable();
            $table->integer('jasa_id')->nullable();
            $table->string('kode_servis',25)->nullable();
            $table->string('merk');
            $table->string('model');
            $table->string('unit');
            $table->text('keterangan');
            $table->integer('categories_id')->nullable();
            $table->integer('garansi_id')->nullable();
            $table->string('snid',25)->nullable();
            $table->longText('keluhan');
            $table->string('status');
            $table->integer('team_id')->nullable();
        });
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('nama');
            $table->text('keterangan');
            $table->double('biaya');
        });
        Schema::create('garansi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('nama');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('garansi');
        Schema::dropIfExists('servis');
        Schema::dropIfExists('categories');
    }
}
