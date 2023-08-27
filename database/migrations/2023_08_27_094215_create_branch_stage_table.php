<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchStageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_stage', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('stage_id')->unsigned()->nullable();
            $table->foreign('stage_id')->on('stages')->references('id')->onDelete('set null');
            $table->bigInteger('branch_id')->unsigned()->nullable();
            $table->foreign('branch_id')->on('branches')->references('id')->onDelete('set null');
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
        Schema::dropIfExists('branch_stage');
    }
}
