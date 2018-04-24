<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobfiles', function (Blueprint $table) {            
          $table->integer('jobs_id')->unsigned()->index();
            $table->string('name');
            $table->string('type');
            $table->string('size');
            $table->timestamps();
            $table->foreign('jobs_id')->references('id')->on('jobs')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobfiles');
    }
}
