<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnInvertoriableAndSerialized extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE items DROP inventoriable');
        DB::statement('ALTER TABLE items DROP serialized');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE items ADD inventoriable');
        DB::statement('ALTER TABLE items ADD serialized');
    }
}
