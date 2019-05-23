<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKlijentiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klijenti', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('naziv');
            $table->string('adresa');
            $table->string('broj_telefona');
            $table->string('email');
            $table->string('kontakt_osoba');
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
        Schema::dropIfExists('klijenti');
    }
}
