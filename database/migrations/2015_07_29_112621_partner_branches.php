<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PartnerBranches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_branches', function (Blueprint $table) {
            $table->increments('branch_id');
            $table->integer('partner_id');
            $table->string('name');
            $table->string('description');               
            $table->string('address');
            $table->enum('status', array('New', 'Active', 'Archived'))->default('Active');

            $table->string('home');
            $table->string('street');
            $table->string('barangay');
            $table->string('city');
            $table->string('province');
            $table->string('country');

            $table->string('mobile_countrycode');
            $table->string('mobile_areacode');
            $table->string('mobile_lineno');
            $table->string('tel_countrycode');
            $table->string('tel_areacode');
            $table->string('tel_lineno');
            $table->string('fax_countrycode');
            $table->string('fax_areacode');
            $table->string('fax_lineno');
            $table->string('email'); 
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
        Schema::drop('partner_branches');
    }
}
