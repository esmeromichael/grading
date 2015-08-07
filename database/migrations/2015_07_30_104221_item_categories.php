<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_categories', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('short');
            $table->string('name');
            $table->string('description');
            $table->enum('active', array('Y','N'))->default('Y');
            $table->enum('for_printing', array('Y','N'))->default('N');
            $table->enum('for_lamination', array('Y','N'))->default('N');
            $table->integer('group')->default('NULL');
            $table->enum('vatable', array('Y', 'N'))->default('Y');
            $table->integer('sales_acct')->default('0');
            $table->integer('usage_acct')->default('0');
            $table->integer('inv_acct')->default('0');
            $table->enum('over_cost', array('null', 'Amount', 'Percent'))->default('NULL');
            $table->decimal('std',12,2)->default('NULL');
            $table->decimal('max',12,2)->default('NULL');
            $table->decimal('min',12,2)->default('NULL');
            $table->string('_token');
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
        Schema::drop('item_categories');
    }
}
