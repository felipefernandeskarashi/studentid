<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->string('rg', 30);
            $table->string('voter_id', 30);
            $table->string('phone', 30);
            $table->string('address', 150);
            $table->string('course', 150);
            $table->string('institution', 150);
            $table->integer('semester');
            $table->string('city', 150);
            $table->string('period', 30);
            $table->string('days', 100);
            $table->date('study_begin');
            $table->date('study_ends');
            $table->binary('photo');
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
        Schema::dropIfExists('students');
    }
}
