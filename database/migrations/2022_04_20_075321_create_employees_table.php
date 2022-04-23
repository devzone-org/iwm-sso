<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('comman_name')->nullable();
            $table->string('display_name')->nullable();
            $table->string('title')->nullable();
            $table->string('mobile')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('user_name')->unique();
            $table->char('status', 1)->default('t');
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
        Schema::dropIfExists('employees');
    }
}
