<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventiTable extends Migration
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
            $table->integer('klijent_id');
            $table->string('naziv');
            $table->date('datum_pocetka');
            $table->time('vreme_pocetka');
            $table->date('datum_zavrsetka');
            $table->time('vreme_zavrsetka');
            $table->timestamps();
        });
        DB::connection('mysql')->table('eventi')->insert([
            [
                'klijent_id' => '1',
                'naziv' => 'Roštilj na dunavu',
                'datum_pocetka' => '2019-06-06',
                'vreme_pocetka' => '18:00:00',
                'datum_zavrsetka' => '2019-06-07',
                'vreme_zavrsetka' => '04:00:00',
            ],
            [
                'klijent_id' => '2',
                'naziv' => 'Dečiji rodjendan',
                'datum_pocetka' => '2019-06-01',
                'vreme_pocetka' => '16:00:00',
                'datum_zavrsetka' => '2019-06-01',
                'vreme_zavrsetka' => '18:00:00',
            ],
            [
                'klijent_id' => '3',
                'naziv' => 'Proslava firme',
                'datum_pocetka' => '2019-06-24',
                'vreme_pocetka' => '18:00:00',
                'datum_zavrsetka' => '2019-06-25',
                'vreme_zavrsetka' => '00:00:00',
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
        Schema::dropIfExists('eventi');
    }
}
