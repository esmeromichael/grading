<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubjectTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subject_id');
            $table->integer('sub_subject_id');
            $table->string('name');
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
        Schema::drop('subject_types');
    }
}
