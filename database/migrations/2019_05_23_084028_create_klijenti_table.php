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

        DB::connection('mysql')->table('klijenti')->insert([
            [
                'naziv' => 'Test klijent',
                'adresa' => 'Gospodska 24, Zemun',
                'broj_telefona' => '0614343424',
                'email' => 'klijent1@gmail.com',
                'kontakt_osoba' => 'Milorad Milonovic',
            ],
            [
                'naziv' => 'Obren Group',
                'adresa' => 'Zagorska 24, Zemun',
                'broj_telefona' => '0615454532',
                'email' => 'obren@gmail.com',
                'kontakt_osoba' => 'Milorad Milonovic',
            ],
            [
                'naziv' => 'Desic Group',
                'adresa' => 'Sirerova 24, Zemun',
                'broj_telefona' => '06143434111',
                'email' => 'desic@gmail.com',
                'kontakt_osoba' => 'Mika Mikic',
            ],
        ]);
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
