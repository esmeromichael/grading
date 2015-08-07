<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('name');
            $table->enum('status', array('New', 'Active', 'Archived'))->default('Active'); 
            $table->enum('customer', array('No', 'Yes'))->default('No');
            $table->enum('supplier', array('No', 'Yes'))->default('No');
            $table->enum('employee', array('No', 'Yes'))->default('No');

            $table->string('address');
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

            $table->enum('business_entity', array('Individual', 'Sole Proprietorship', 'Partnership', 'Corporation'));

            $table->string('tin');
            $table->string('reg_no');
            $table->string('reg_date'); 
            $table->date('birthday');
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
        Schema::drop('partners');
    }
}
