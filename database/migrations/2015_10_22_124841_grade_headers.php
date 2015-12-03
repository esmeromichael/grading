<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GradeHeaders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade_headers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subject_id');
            $table->integer('subsubject_id');
            $table->string('remarks');
            $table->date('exam_date');
            $table->decimal('no_of_items',20,2)->default('0.00');
            $table->enum('status',array('Active','Inactive'));
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
        Schema::drop('grade_headers');
    }
}
