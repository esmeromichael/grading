<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Purchases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('po_no');
            $table->date('delivery_date');
            $table->integer('partner_id');
            $table->string('remarks');
            $table->integer('item_id');
            $table->integer('uom');
            $table->decimal('qty',20,4)->default('0.0000');
            $table->decimal('qoh',12,4)->default('0.0000');
            $table->string('unit');
            $table->decimal('price',20,4)->default('0.0000');
            $table->decimal('total_amt',20,4)->default('0.0000');
            $table->decimal('oitem_cost',20,4)->default('0.0000');
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
        Schema::drop('purchases');
    }
}
