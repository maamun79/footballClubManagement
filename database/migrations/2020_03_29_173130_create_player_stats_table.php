<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_stats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('player_id');
            $table->unsignedBigInteger('match_id');
            $table->string('rating');
            $table->string('time_played');
            $table->string('goals');
            $table->string('assist');
            $table->string('yellow_card');
            $table->string('red_card');
            $table->string('shots');
            $table->string('shots_on_target');
            $table->string('shots_off_target');
            $table->string('dribbles_attempted');
            $table->string('dribbles_won');
            $table->string('offsides');
            $table->string('fouled');
            $table->string('total_passes');
            $table->string('accurate_passes');
            $table->string('pass_accuracy');
            $table->string('key_passes');
            $table->string('through_balls');
            $table->string('crosses');
            $table->string('long_balls');
            $table->string('aerials');
            $table->string('aerials_won');
            $table->string('tackles_attempted');
            $table->string('successfull_tackles');
            $table->string('clearances');
            $table->string('interceptions');
            $table->string('foules');
            $table->string('dispossessed');
            $table->string('dribbled_past');
            $table->timestamps();

            $table->foreign('player_id')
                  ->references('id')->on('players')
                  ->onDelete('cascade');

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
        Schema::dropIfExists('player_stats');
    }
}
