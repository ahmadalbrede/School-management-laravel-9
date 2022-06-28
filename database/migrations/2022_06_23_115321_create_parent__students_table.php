<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent__students', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('student_id')->unsigned();

            $table->bigInteger('parnt_id')->unsigned();

            $table->string('relation');

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            
            $table->foreign('parnt_id')->references('id')->on('parnts')->onDelete('cascade');

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
        Schema::dropIfExists('parent__students');
    }
}
