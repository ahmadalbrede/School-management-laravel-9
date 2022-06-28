<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class__branches', function (Blueprint $table) {
            $table->id();

            $table->string('queue');

            $table->integer('class_id');

            $table->integer('branch_id');

            $table->integer('stage_id');

            $table->date('start_date');

            $table->date('end_date');

            $table->integer('number_student');

            // $table->integer('stage_id');

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
        Schema::dropIfExists('class__branches');
    }
}
