<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsInCreatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('creators', function (Blueprint $table) {
            $table->integer('age');
            $table->text('biography')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('creators', function (Blueprint $table) {
            $table->dropColumn('age');
            $table->dropColumn('biography');
        });
    }
}
