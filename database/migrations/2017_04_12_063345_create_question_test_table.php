<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_test', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('test_id')->index();
            $table->foreign('test_id')->references('id')->on('tests');
            $table->unsignedInteger('question_id')->index();
            $table->foreign('question_id')->references('id')->on('questions');
            $table->string('choice_answer_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_test');
    }
}
