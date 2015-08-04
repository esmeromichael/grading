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
            $table->increments('partner_id');
              $table->string('partner_type');
            $table->string('name');
             $table->string('is_customer');
             $table->string('is_employee');
             $table->string('is_supplier');
            $table->enum('status', array('New', 'Active', 'Archived'))->default('Active'); 
                     
            $table->string('address');
            $table->string('home');
            $table->string('street');
            $table->string('house_no');
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
            $table->string('email');
            $table->string('fax_countrycode'); 
            $table->string('fax_areacode');
            $table->string('fax_lineno');

            $table->integer('business_entity');
            $table->string('tin'); 
            $table->date('birthday');
            $table->date('date_of_reg');
            $table->date('date_of_inc');
            $table->string('reg_no');
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
