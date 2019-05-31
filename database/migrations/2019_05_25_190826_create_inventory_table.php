<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('naziv');
            $table->string('mera');
            $table->float('cena');
            $table->integer('pocetno_stanje');
            $table->integer('magacin_id');
            $table->timestamps();
        });

        DB::connection('mysql')->table('inventory')->insert([
            [
                'naziv' => 'Vinska čaša',
                'mera' => 'komad',
                'cena' => '50',
                'pocetno_stanje' => '80',
                'magacin_id' => '3',
            ],
            [
                'naziv' => 'Duboki tanjiri',
                'mera' => 'komad',
                'cena' => '100',
                'pocetno_stanje' => '300',
                'magacin_id' => '3',
            ],
            [
                'naziv' => 'Kašike',
                'mera' => 'komad',
                'cena' => '20',
                'pocetno_stanje' => '460',
                'magacin_id' => '3',
            ],
            [
                'naziv' => 'Viljuške',
                'mera' => 'komad',
                'cena' => '20',
                'pocetno_stanje' => '460',
                'magacin_id' => '3',
            ],
            [
                'naziv' => 'Niževi',
                'mera' => 'komad',
                'cena' => '20',
                'pocetno_stanje' => '460',
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
        Schema::dropIfExists('inventory');
    }
}
