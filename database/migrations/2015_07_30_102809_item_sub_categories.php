<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemSubCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_sub_categories', function (Blueprint $table) {
            $table->increments('id');          
            $table->integer('item_category_id');
            $table->string('name');
            $table->string('description');
            $table->integer('level');;
            $table->integer('parent');
            $table->integer('group');
            $table->enum('active', array('Y', 'N'));
            $table->enum('for_printing', array('Y', 'N'))->default('N');
            $table->enum('for_lamination', array('Y', 'N'))->default('N');
            $table->enum('vatable', array('Y', 'N'));
            $table->integer('sales_acct');;
            $table->integer('usage_acct');
            $table->integer('invi_acct');
            $table->enum('over_cost', array('Amount','Percent'));
            $table->decimal('std',12,2);
            $table->decimal('max',12,2);
            $table->decimal('min',12,2);
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
        Schema::drop('item_sub_categories');
    }
}
