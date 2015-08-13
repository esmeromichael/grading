<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTablePurchaseHeaders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_headers', function (Blueprint $table) {
            $table->integer('client');
            $table->integer('module_id');
            $table->increments('id');
            $table->integer('partner_id');
            $table->integer('branch_id');
            $table->integer('contact_id');
            $table->date('po_date');
            $table->string('delivery_date');
            $table->date('date_needed');
            $table->integer('term');
            $table->enum('confidential', array('Y','N'))->default('N');
            $table->decimal('total_amt',20,2);
            $table->decimal('balance',20,2);
            $table->string('remarks');
            $table->string('notes');
            $table->enum('status', array('New','Active','Archieve'))->default('Active');
            $table->integer('a_status');
            $table->enum('d_status', array('Undelivered','Partial','Completed'))->default('Undelivered');
            $table->enum('vatComp', array('before discount','after discount'));
            $table->decimal('inputVat',10,2);
            $table->decimal('discount',12,2);
            $table->string('approver');
            $table->integer('created_by');
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
        Schema::drop('purchase_headers');
    }
}
