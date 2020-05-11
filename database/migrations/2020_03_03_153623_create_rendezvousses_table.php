<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRendezvoussesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rendezvousses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('medecin')->unsigned();
            $table->foreign('medecin')->references('id')->on('medecins');
            $table->bigInteger('user')->unsigned();
            $table->foreign('user')->references('id')->on('users');
            $table->text('libelle');
            $table->date('date');
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
        Schema::dropIfExists('rendezvousses');
    }
}
