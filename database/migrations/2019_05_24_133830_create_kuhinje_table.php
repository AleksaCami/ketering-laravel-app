<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKuhinjeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuhinje', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('naziv');
            $table->text('opis');
            $table->integer('magacin_id');
            $table->timestamps();
        });

        DB::connection('mysql')->table('kuhinje')->insert([
            [
                'naziv' => 'Hladna kuhinja',
                'opis' => 'Ovo je hladna kuhinja',
                'magacin_id' => '1',
            ],
            [
                'naziv' => 'Topla kuhinja',
                'opis' => 'Ovo je topla kuhinja',
                'magacin_id' => '1',
            ],
            [
                'naziv' => 'Salate',
                'opis' => 'Ovo je kuhinja gde se prave salate',
                'magacin_id' => '2',
            ],
            [
                'naziv' => 'Slatka',
                'opis' => 'Ovo je kuhinja gde se prave slatkisi',
                'magacin_id' => '2',
            ],
            [
                'naziv' => 'Pekara',
                'opis' => 'Ovo je kuhinja gde se prave peciva',
                'magacin_id' => '3',
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
        Schema::dropIfExists('kuhinje');
    }
}
