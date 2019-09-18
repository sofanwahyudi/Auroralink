<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('judul');
            $table->longText('keterangan');
            $table->string('screenshot',60)->nullable();
            $table->integer('ticket_prioritas_id')->unsigned();
            $table->integer('users_id')->unsigned();
            $table->integer('devisi_id')->unsigned();
            $table->integer('dept_id')->unsigned();
            $table->integer('ticket_kategori_id')->unsigned();
            $table->string('status')->default('open');
        });
        Schema::create('ticket_prioritas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
        });
        Schema::create('ticket_kategori', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
        });
        Schema::create('ticket_komentar', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('ticket_id')->unsigned();
            $table->integer('parent_id')->unsigned()->nullable();
            $table->text('body');
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
        Schema::dropIfExists('ticket');
        Schema::dropIfExists('ticket_prioritas');
        Schema::dropIfExists('ticket_kategori');
        Schema::dropIfExists('ticket_komentar');
    }
}
