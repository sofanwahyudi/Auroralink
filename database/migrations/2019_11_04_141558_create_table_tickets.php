<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTickets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('subject');
            $table->longText('content');
            $table->integer('status_id')->unsigned();
            $table->integer('priority_id')->unsigned();
            $table->integer('users_id')->unsigned();
            $table->integer('cats_id')->unsigned();
            $table->integer('team_id')->unsigned();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });
        Schema::create('tickets_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('color');
        });
        Schema::create('tickets_priorities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('color');
        });
        Schema::create('tickets_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('color');
        });
        Schema::create('tickets_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->integer('users_id')->unsigned();
            $table->integer('tickets_id')->unsigned();
            $table->timestamps();
        });
        Schema::create('tickets_audits', function (Blueprint $table) {
            $table->increments('id');
            $table->text('operation');
            $table->integer('users_id')->unsigned();
            $table->integer('ticketsid')->unsigned();
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
        Schema::dropIfExists('tickets_audits');
        Schema::dropIfExists('tickets_comments');
        Schema::dropIfExists('tickets');
        Schema::dropIfExists('tickets_categories');
        Schema::dropIfExists('tickets_priorities');
        Schema::dropIfExists('tickets_statuses');
    }
}
