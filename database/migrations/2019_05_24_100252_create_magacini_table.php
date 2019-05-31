<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMagaciniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('magacini', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('naziv');
            $table->string('opis');
            $table->timestamps();
        });

        DB::connection('mysql')->table('magacini')->insert([
            [
                'naziv' => 'Magacin jedan',
                'opis' => 'Ovo je magacin jedan',
            ],
            [
                'naziv' => 'Magacin dva',
                'opis' => 'Ovo je magacin dva',
            ],
            [
                'naziv' => 'Magacin tri',
                'opis' => 'Ovo je magacin tri',
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
        Schema::dropIfExists('magacini');
    }
}
