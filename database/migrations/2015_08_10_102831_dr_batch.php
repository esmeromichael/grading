<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DrBatch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dr_batch', function (Blueprint $table) {
            $table->integer('dr_no');
            $table->integer('ref_type');
            $table->integer('ref_no');
            $table->increments('batch');
            $table->integer('o_id');
            $table->string('batch_name');

            $table->timestamps();
        });
        DB::unprepared('ALTER TABLE dr_batch DROP PRIMARY KEY, ADD PRIMARY KEY (batch, dr_no, ref_type, ref_no, o_id)');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dr_batch');
    }
}
