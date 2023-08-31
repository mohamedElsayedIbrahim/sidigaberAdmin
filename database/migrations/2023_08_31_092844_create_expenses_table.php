<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_enrollment_id')->unsigned();
            $table->foreign('student_enrollment_id')->on('student_enrollments')->references('id')->cascadeOnDelete();
            $table->decimal('fees')->nullable();
            $table->boolean('pay')->default(0);
            $table->dateTime('payment_date')->nullable();
            $table->enum('type',['bus','school'])->default('school');
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
        Schema::dropIfExists('expenses');
    }
}
