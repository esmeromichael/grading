<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemPrices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_prices', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('partner_id');
            $table->integer('branch_id');
            $table->integer('item_id');
            $table->decimal('q_price',12,4)->default('0.0000');
            $table->enum('disc_type', array('Amount', 'Percent'));
            $table->decimal('disc',11,2)->default('0.00');
            $table->decimal('cost',11,4)->default('0.0000');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', array('Active', 'Void', 'New'));
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
        Schema::drop('item_prices');
    }
}
