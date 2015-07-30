<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Items extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id');
            $table->string('code');
            $table->string('sku');
            $table->string('generic');
            $table->string('brand');
            $table->string('make');
            $table->string('model');
            $table->string('color');
            $table->string('size_dim');
            $table->string('gauge_thick');
            $table->string('description');
            $table->integer('account');
            $table->integer('category');
            $table->decimal('reorder_lvl',11,2)->default('0.00');
            $table->integer('lead_time');
            $table->integer('uom');

            $table->decimal('ave_cost',20,4)->default('0.0000');
            $table->decimal('item_cost',12,4)->default('0.0000');
            $table->enum('status', array('New', 'Active', 'Archived'))->default('New');
            $table->enum('for_sale', array('Y', 'N'))->default('Y');
            $table->enum('vatable', array('Y', 'N'))->default('Y');
            $table->enum('inventoriable', array('Y', 'N'))->default('N');
            $table->enum('serialized', array('Y', 'N'))->default('N');

            $table->integer('sales_acct');
            $table->integer('usage_acct');
            $table->integer('inv_acct');

            $table->enum('over_cost', array('null', 'Amount', 'Percent'))->default('NULL');

            $table->decimal('std',12,2)->default('0.00');
            $table->decimal('max',12,2)->default('0.00');
            $table->decimal('min',12,2)->default('0.00');
            $table->integer('old_id');


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
        Schema::drop('items');
    }
}
