<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('question', 255)->unique()->nullable();
            $table->string('correct_choice', 255)->unique()->nullable();
            $table->unsignedBigInteger('test_id')->nullable();
            $table->unsignedBigInteger('book_id')->nullable();
            $table->timestamps();

            $table->foreign('test_id')->references('id')->on('questions_categories');
            $table->foreign('book_id')->references('id')->on('books');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
