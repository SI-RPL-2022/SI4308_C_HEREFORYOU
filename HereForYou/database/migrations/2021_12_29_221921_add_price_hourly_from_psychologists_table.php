<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriceHourlyFromPsychologistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('psychologists', function (Blueprint $table) {
            $table->bigInteger('price_hourly')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('psychologists', function (Blueprint $table) {
            $table->dropColumn('price_hourly');
        });
    }
}
