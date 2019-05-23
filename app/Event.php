<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';
    protected $fillable = [
        'naziv', 'datum_pocetka', 'vreme_pocetka', 'datum_zavrsetka', 'vreme_zavrsetka', 'klijent'
    ];

}
