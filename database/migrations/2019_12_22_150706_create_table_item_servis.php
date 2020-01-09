<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableItemServis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_servis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('servis_id');
            $table->integer('merk_id')->unsigned();
            $table->integer('model_id')->unsigned();
            $table->string('serial_number');
            $table->string('warna');
            $table->integer('garansi_id')->nullable();
            $table->string('keluhan');
            $table->double('biaya');
            $table->timestamps();
            $table->foreign('servis_id')->references('id')->on('servis')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_servis');
    }
}
