<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StudentInfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('subject_id');
            $table->integer('subsuject_id');
            $table->integer('exam_id');
            $table->integer('age');
            $table->enum('sex',array('Male','Female'));
            $table->enum('status',array('Active','Inactive'))->default('Active');
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
        Schema::drop('student_infos');
    }
}
