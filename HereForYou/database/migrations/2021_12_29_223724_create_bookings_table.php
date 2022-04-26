<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->integer('number')->unique();
            $table->foreignId('psychologist_id')->constrained('psychologists')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('package');
            $table->string('media');
            $table->string('topic');
            $table->dateTime('time');
            $table->integer('duration');
            $table->bigInteger('cost');
            $table->string('bank_name');
            $table->bigInteger('bank_number');
            $table->enum('status',['SUCCESS','FAILED','PENDING'])->default('PENDING');
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
        Schema::dropIfExists('bookings');
    }
}
