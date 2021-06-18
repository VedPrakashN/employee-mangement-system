<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreviousExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('previous_experiences', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id');
            $table->string('company');
            $table->string('designation');
            $table->date('joining');
            $table->date('leaving')->nullable();
            $table->string('ctc')->nullable();
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
        Schema::dropIfExists('previous_experiences');
    }
}
