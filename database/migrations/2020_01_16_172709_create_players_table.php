<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('dob');
            $table->string('country');
            $table->string('email');
            $table->string('contact_no');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('agent_name');
            $table->string('contract_start_date');
            $table->string('contract_end_date');
            $table->integer('salary_per_month');
            $table->integer('buying_price');
            $table->string('previous_club');
            $table->integer('jersy_no');
            $table->string('position');
            $table->string('status')->default('available');
            $table->string('image');
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
        Schema::dropIfExists('players');
    }
}
