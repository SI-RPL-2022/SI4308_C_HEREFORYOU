<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsychologistSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('psychologist_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('psychologist_id')->constrained('psychologists')->cascadeOnDelete();
            $table->string('day');
            $table->time('opened_at')->nullable();
            $table->time('closed_at')->nullable();
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
        Schema::dropIfExists('psychologist_schedules');
    }
}
