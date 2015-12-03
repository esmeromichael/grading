<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ScoreHeaders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('score_headers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subject_id');
            $table->integer('sub_subject_id');
            $table->date('exam_date');
            $table->decimal('no_of_items',24,2)->default('0.00');
            $table->string('remarks');
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
        Schema::drop('score_headers');
    }
}
