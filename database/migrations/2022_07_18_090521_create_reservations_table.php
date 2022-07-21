<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('account_id');
            $table->string('reservation_id');
            $table->string('room_id');
            $table->integer('nights');
            $table->integer('rooms');
            $table->integer('adults');
            $table->integer('children');
            $table->date('arrival_date');
            $table->date('departure_date');
            $table->boolean('reserved')->default(false);
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
        Schema::dropIfExists('reservations');
    }
}
