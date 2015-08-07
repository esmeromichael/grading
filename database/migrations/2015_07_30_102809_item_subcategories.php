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
        Schema::create('item_subcategories', function (Blueprint $table) {
            $table->increments('id');          
            $table->integer('parent')->default('0');
            $table->string('short')->default('NULL');
            $table->string('name')->default('NULL');
            $table->string('description')->default('NULL');
            $table->enum('active', array('Y', 'N'))->default('Y');
            $table->enum('for_printing', array('Y', 'N'))->default('N');
            $table->enum('for_lamination', array('Y', 'N'))->default('N');
            $table->integer('group')->default('NULL');
            $table->enum('vatable', array('Y', 'N'));
            $table->integer('sales_acct')->default('0');
            $table->integer('usage_acct')->default('0');
            $table->integer('invi_acct')->default('0');
            $table->enum('over_cost', array('Amount','Percent'))->default('NULL');
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
        Schema::drop('item_subcategories');
    }
}
