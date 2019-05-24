<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('naziv');
            $table->date('datum_pocetka');
            $table->time('vreme_pocetka');
            $table->date('datum_zavrsetka');
            $table->time('vreme_zavrsetka');
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
        Schema::dropIfExists('eventi');
    }
}
