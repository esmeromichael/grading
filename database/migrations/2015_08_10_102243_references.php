<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class References extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_references', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ref_type');
            $table->string('database');
            $table->string('tables');
            $table->string('pk');
            $table->string('prefix');
            $table->string('description');

           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('module_references');
    }
}
