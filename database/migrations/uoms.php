<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UOMS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uoms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('short');
            $table->string('name');
            $table->string('plural_name');               
            $table->string('address');
            $table->enum('active', array('Y', 'N'))->default('Y');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('uoms');
    }
}
