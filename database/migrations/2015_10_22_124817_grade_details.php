<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GradeDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('exam_id');
            $table->integer('studentinfo_id');
            $table->integer('subject_id');
            $table->integer('subsubject_id');
            $table->decimal('score',20,2)->default('0.00');
            $table->enum('status',array('Take','Untake'));
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
        Schema::drop('grade_details');
    }
}
