<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ScoreDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('score_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_info_id');
            $table->integer('subject_id');
            $table->integer('sub_subject_id');
            $table->integer('score');
            $table->enum('status', array('New','Finalized','Void'))->default('New');
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
        Schema::drop('score_details');
    }
}
