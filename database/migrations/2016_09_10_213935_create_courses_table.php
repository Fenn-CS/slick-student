<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
             $table->increments('id');
             $table->unsignedInteger('program_id');
             $table->string('code');
             $table->string('title');
             $table->unsignedInteger('credit_value');
             $table->string('status');
             $table->unsignedInteger('level');
             $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
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
        Schema::drop('courses');
    }
}
