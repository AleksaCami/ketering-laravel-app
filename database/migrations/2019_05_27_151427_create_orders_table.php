<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('event_id');
            $table->text('napomena');
            $table->dateTime('rok_izrade');
            $table->boolean('status');
            $table->boolean('prihvacena');
            $table->integer('stanje_dostava');
            $table->timestamps();
        });
        DB::connection('mysql')->table('orders')->insert([
            [
                'napomena' => 'Ćevapi moraju da budu dobro pečeni',
                'rok_izrade' => '2019-06-06 17:00:00',
                'status' => '0',
                'event_id' => '1',
                'prihvacena' => '0',
                'stanje_dostava' => '0'
            ],
            [
                'napomena' => 'Pica mora biti vruca',
                'rok_izrade' => '2019-06-01 15:30:00',
                'status' => '0',
                'event_id' => '2',
                'prihvacena' => '0',
                'stanje_dostava' => '0'
            ],
            [
                'napomena' => 'Podvarak mora biti masan',
                'rok_izrade' => '2019-06-24 17:00:00',
                'status' => '0',
                'event_id' => '3',
                'prihvacena' => '0',
                'stanje_dostava' => '0'
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
        Schema::dropIfExists('orders');
    }
}
