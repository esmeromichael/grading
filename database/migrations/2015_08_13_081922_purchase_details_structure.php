<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PurchaseDetailsStructure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->integer('client');
            $table->integer('module_id');
            $table->integer('po_no_id');
            $table->increments('id');
            $table->integer('pr_no');
            $table->integer('pr_dtl_id');
            $table->integer('contract_no');
            $table->integer('item_id');
            $table->integer('uom');
            $table->decimal('qoh',12,4)->default('0.0000');
            $table->decimal('qty',20,4)->default('0.0000');
            $table->decimal('price',20,4)->default('0.0000');
            $table->decimal('adj_amt',20,2)->default('0.00');
            $table->decimal('total_amt',20,2)->default('0.00');
            $table->decimal('cc',10,2)->default('0.00');
            $table->decimal('oItem_cost',20,2)->default('0.00');
            $table->decimal('item_cost',12,4)->default('0.0000');
            $table->decimal('eqty',12,2)->default('1.00');
            $table->decimal('disc',10,2)->default('0.00');
            $table->decimal('q_price',12,3)->default('0.0000');
            $table->enum('disc_type',array('amount','percent'))->default('amount');
            $table->integer('department')->default('0');
            $table->string('remarks');
            $table->string('reference');
            $table->date('delivery_date');
            $table->date('due_date');
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
        Schema::drop('purchase_details');
    }
}
