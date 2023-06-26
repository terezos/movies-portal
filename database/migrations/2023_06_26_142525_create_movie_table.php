<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cinema_id');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->longText('timetable');
            $table->string('image')->nullable();
            $table->string('genre');
            $table->string('imdb_link');
            $table->string('rotten_tomatoes_link')->nullable();
            $table->string('imdb_code')->nullable();
            $table->date('date_start');
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('cinema_id')->references('id')->on('cinemas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie');
    }
};
