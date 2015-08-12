<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeItemLocalKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE items CHANGE category category_id INT');
        DB::statement('ALTER TABLE items CHANGE subcategory subcategory_id INT');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE items CHANGE category_id category INT');
        DB::statement('ALTER TABLE items CHANGE subcategory_id subcategory INT');
    }
}
