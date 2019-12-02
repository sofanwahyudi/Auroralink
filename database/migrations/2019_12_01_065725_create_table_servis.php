<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableServis extends Migration
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
            $table->unsignedBigInteger('users_id')->nullable();
            $table->integer('team_id')->unsigned();
            $table->date('recieve_at')->nullable();
            $table->date('completed_at')->nullable();
            $table->string('keterangan');
            $table->integer('status_id')->unsigned();
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('servis');
    }

}
