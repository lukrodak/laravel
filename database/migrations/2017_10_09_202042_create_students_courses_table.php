<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned()->index();
            $table->integer('course_id')->unsigned()->index();

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students_courses');
    }
}
