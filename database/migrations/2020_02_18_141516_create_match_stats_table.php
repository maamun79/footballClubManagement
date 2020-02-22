<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_stats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('match_id');
            $table->string('shots');
            $table->string('shots_on_target');
            $table->string('possession');
            $table->string('passes');
            $table->string('pass_accuracy');
            $table->string('foul_commited');
            $table->string('foul_conside');
            $table->string('yellow_cards');
            $table->string('red_cards');
            $table->string('offsides');
            $table->string('corners');
            $table->string('goal');
            $table->string('goal_consided');
            $table->timestamps();

            $table->foreign('match_id')
                  ->references('id')->on('matches')
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
        Schema::dropIfExists('match_stats');
    }
}
