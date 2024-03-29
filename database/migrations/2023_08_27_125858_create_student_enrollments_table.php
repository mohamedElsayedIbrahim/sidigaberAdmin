<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentEnrollmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_enrollments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('academicyear_id')->nullable()->unsigned();
            $table->foreign('academicyear_id')->on('academicyears')->references('id')->cascadeOnDelete();
            $table->bigInteger('branch_id')->nullable()->unsigned();
            $table->foreign('branch_id')->on('branches')->references('id')->cascadeOnDelete();
            $table->bigInteger('stage_id')->nullable()->unsigned();
            $table->foreign('stage_id')->on('stages')->references('id')->cascadeOnDelete();
            $table->string('student_id',14)->nullable();
            $table->foreign('student_id')->on('students')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('student_enrollments');
    }
}
