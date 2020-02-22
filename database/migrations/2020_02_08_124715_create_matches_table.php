<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tournament_id');
            $table->string('match_date');
            $table->string('starting_time');
            $table->string('venue_name');
            $table->string('venue_country');
            $table->string('opposite_team');
            $table->string('match_type');
            $table->integer('match_day');
            $table->string('opposite_team_logo');
            $table->string('status')->default('Undefined');
            $table->timestamps();
            
            $table->foreign('tournament_id')
                  ->references('id')->on('tournaments')
                  ->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
