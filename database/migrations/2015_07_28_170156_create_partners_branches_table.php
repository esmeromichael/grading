<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnersBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners_branches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('partner_id');
            $table->enum('status', array('New', 'Active', 'Archived'))->default('Active'); 
                     
            $table->string('address');
            $table->string('home');
            $table->string('street');
            $table->string('barangay');
            $table->string('city');
            $table->string('province');
            $table->string('country');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('partners_branches');
    }
}
