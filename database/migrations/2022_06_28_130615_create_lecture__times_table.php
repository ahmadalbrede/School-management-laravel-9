<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLectureTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecture__times', function (Blueprint $table) {
            $table->id();

            // $table->date("h,i",('begin'));

            // $table->date("h,i",('end'));

            $table->time('begin');

            $table->time('end');

            $table->bigInteger('day_id');

            $table->bigInteger('lecture_id');

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
        Schema::dropIfExists('lecture__times');
    }
}
