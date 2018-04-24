<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_message', function (Blueprint $table) {
            $table->integer('jobs_id')->unsigned()->index();
            $table->integer('messages_id')->unsigned()->index();
            $table->foreign('jobs_id')->references('id')->on('jobs')->onDelete('cascade');
            $table->foreign('messages_id')->references('id')->on('messages')->onDelete('cascade');
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
        Schema::dropIfExists('job_message');
    }
}
