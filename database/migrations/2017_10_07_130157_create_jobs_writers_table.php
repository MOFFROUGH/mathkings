<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsWritersTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('jobs_writers', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('writer_id')->unsigned()->index();
      $table->integer('job_id')->unsigned()->index();
      $table->foreign('writer_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
      $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade')->onUpdate('cascade');
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
    Schema::dropIfExists('jobs_writers');
  }
}
