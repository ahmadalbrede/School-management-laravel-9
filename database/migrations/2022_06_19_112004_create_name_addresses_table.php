<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNameAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('name_addresses', function (Blueprint $table) {
            $table->id();

            $table->string('name_address');

            $table->bigInteger('area_id')->unsigned();

            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');

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
        Schema::dropIfExists('name_addresses');
    }
}
