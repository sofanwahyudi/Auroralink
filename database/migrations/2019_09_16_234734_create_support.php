<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('kode_support',25)->nullable();
            $table->string('pt');
            $table->string('nama');
            $table->string('alamat');
            $table->string('email');
            $table->string('telepon');
            $table->string('deskripsi');
            $table->integer('jasa_id')->nullable();
            $table->integer('users_id')->nullable();
            $table->integer('team_id')->nullable();
            $table->string('status')->default('open');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('support');
    }
}
