<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DrDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('dr_details', function (Blueprint $table) {
            $table->increments('dr_dtl_id');
            $table->integer('client');
            $table->integer('module_id');
            $table->integer('dr_no');
            $table->integer('ref_type');
            $table->integer('ref_no');
            $table->integer('ref_dtl_id');
            $table->integer('batch_no');
            $table->integer('item_id');
            $table->integer('uom');
            $table->decimal('qoh',12,2)->default('0.00');
            $table->decimal('qty',20,2)->default('0.00');
            $table->decimal('price',20,2)->default('0.00');
            $table->decimal('total_amt',20,2)->default('0.00');
            $table->decimal('item_cost',12,2)->default('0.00');
            $table->decimal('eqty',12,2)->default('0.00');
            $table->decimal('disc',10,2)->default('0.00');

            $table->decimal('q_price',12,2)->default('0.00');
            $table->enum('desc_type', array('amount', 'percent'));
            $table->string('remarks');
            $table->decimal('max',12,2)->default('0.00');
            $table->decimal('min',12,2)->default('0.00');
            $table->decimal('std',12,2)->default('0.00');
            $table->string('uuid');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dr_details');
    }
}
