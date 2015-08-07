<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CITIZENSHIPS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citizenships', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');               
            $table->enum('is_local', array('Y', 'N'))->default('N');
            $table->enum('status', array('Active', 'Inactive', 'Archived'))->default('Active');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('citizenships');
    }
}
