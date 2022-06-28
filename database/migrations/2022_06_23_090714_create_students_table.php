<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('address_id')->unsigned()->nullable();

            // $table->string('first_name_en');

            $table->string('first_name_ar');

           // $table->string('middle_name_en');

            $table->string('middle_name_ar');

            // $table->string('last_name_en');

            $table->string('last_name_ar');

            $table->string('email')->nullable();

            $table->string('password')->nullable();

            $table->string('number_phone');

            $table->text('photo')->nullable();

            $table->date('dob');

            $table->enum('gender',['male','famale']);

            $table->datetime('registration_date')->default(now());

            $table->datetime('password_change_date')->nullable();

            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');

            // $table->foreign('address_id')->constrained('addresses', 'id')->cascadeOnDelete();

            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
