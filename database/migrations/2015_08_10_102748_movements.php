<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Movements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movements', function (Blueprint $table) {

            $table->increments('movement_id');
            $table->integer('client');
            $table->integer('module_id');
            $table->integer('doc_type');
            $table->integer('doc_no');
            $table->integer('d0c_dtl');
            $table->date('date');
            $table->enum('type', array('in', 'out'))->default('out');
            $table->integer('location');
            $table->integer('item_id');
            $table->integer('partner_id');
            $table->integer('unit_id');
            $table->decimal('qty',20,4)->default('0.0000');
            $table->integer('moved_by');
            $table->enum('unpacked', array('Y', 'N'))->default('N');
            $table->string('remarks');
            $table->integer('old_id');
            $table->timestamps('log_date');

           
        });
        DB::unprepared('ALTER TABLE movements DROP PRIMARY KEY, ADD PRIMARY KEY (movement_id, module_id, doc_type, doc_no, d0c_dtl, location, item_id, partner_id, unit_id)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('movements');
    }
}
