<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParntsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parnts', function (Blueprint $table) {
            $table->id();

            $table->string('first_name');

            $table->string('middle_name');

            $table->string('last_name');

            $table->string('email')->unique();

            $table->enum('gender',['male','famale']);

            $table->string('password');

            $table->string('number_phone');

           // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parnts');
    }
}
