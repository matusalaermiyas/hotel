<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->integer('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('city')->nullable();
            $table->string('state_or_province')->nullable();
            $table->string('country')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('role')->default('customer');
            $table->string('employee_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
