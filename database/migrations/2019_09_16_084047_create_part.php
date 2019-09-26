<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedInteger('supplier_id')->nullable();
            $table->unsignedInteger('kategori_id')->nullable();
            $table->string('nama')->nullable();
            $table->string('gambar')->nullable();
            $table->string('sku');
            $table->string('barcode');
            $table->text('deskripsi')->nullable();
            $table->double('berat')->default(0);
            $table->double('harga_beli');
            $table->double('harga_jual');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('part');
    }
}
