<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableServisKelengkapan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servis_kelengkapan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('servis_detail_id');
            $table->unsignedInteger('kelengkapan_id');
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
        Schema::dropIfExists('servis_kelengkapan');
    }
}
