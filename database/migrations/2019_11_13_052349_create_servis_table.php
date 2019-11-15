<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServisTable extends Migration
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
            $table->string('kode_servis');
            $table->integer('users_id')->unsigned();
            $table->integer('team_id')->unsigned();
            $table->date('recieve_at')->nullable();
            $table->date('delivery_at')->nullable();
            $table->string('noted');
            $table->integer('status_id')->unsigned();
            $table->longText('keluhan');
            $table->timestamps();
        });

        Schema::create('kelengkapan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('kondisi');
            $table->timestamps();
        });
        Schema::create('garansi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->timestamps();
        });
        Schema::create('servis_item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('servis_id')->unsigned();
            $table->integer('merk_id')->unsigned();
            $table->string('serial_number');
            $table->string('warna');
            $table->integer('kelengkapan_id')->unsigned();
            $table->integer('garansi_id')->nullable();
            $table->string('keterangan');
            $table->double('biaya');
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
        Schema::dropIfExists('servis');
        Schema::dropIfExists('kelengkapan');
        Schema::dropIfExists('garansi');
        Schema::dropIfExists('servis_item');
    }
}
