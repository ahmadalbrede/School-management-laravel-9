<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {

            $table->id();

            $table->bigInteger('name_address_id')->unsigned();

            // $table->string('details');

            $table->integer('telphone');

            $table->foreign('name_address_id')->references('id')->on('name_addresses')->onDelete('cascade');

           // $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');

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
        Schema::dropIfExists('addresses');
    }
}
