<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PartnerContacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_contacts', function (Blueprint $table) {
            $table->increments('contact_id');
            $table->integer('partner_id');
            $table->enum('status', array('New', 'Active', 'Archived'))->default('New'); 
                     

            $table->string('full_name');
            $table->enum('title', array('Mr.', 'Mrs.', 'Ms.', 'Atty.', 'Dr.'));
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('position');

            $table->string('address');
            $table->string('home');
            $table->string('street');
            $table->string('barangay');
            $table->string('city');
            $table->string('province');
            $table->string('country');

            $table->string('citizenship');
            $table->enum('gender', array('Female', 'Male'));
            $table->enum('marital_status', array('Single', 'Marrried', 'Separated', 'Widow'));
            $table->enum('active', array('Y','N'))->default('Y'); 
            $table->date('birthday');

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
        Schema::drop('partner_contacts');
    }
}
