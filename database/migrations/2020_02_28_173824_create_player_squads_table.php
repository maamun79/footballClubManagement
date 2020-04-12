<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerSquadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_squads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('squad_id');
            $table->unsignedBigInteger('player_id');
            $table->string('stat_status')->default('Undefined');
            $table->timestamps();

            $table->foreign('squad_id')
                  ->references('id')->on('squads')
                  ->onDelete('cascade');

            $table->foreign('player_id')
                  ->references('id')->on('players')
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
        Schema::dropIfExists('player_squads');
    }
}
