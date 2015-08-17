<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BulkUnits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulk_units', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id');
            $table->integer('item_category');
            $table->string('item_code', 50);
            $table->string('description', 150);
            $table->string('name', 150);
            $table->float('qty');
            $table->integer('uom_id');
            $table->enum('active', array('N', 'Y'))->default('Y');
            $table->enum('type', array('base', 'bulk'));
            $table->decimal('length', 10, 2);
            $table->decimal('width', 10, 2);
            $table->decimal('height', 10, 2);
            $table->decimal('weight', 10, 2);
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->string('unit_code', 100);
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
        Schema::drop('bulk_units');
    }
}
