<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Klijent extends Model
{
    protected $table = 'klijenti';
    protected $fillable = [
        'naziv', 'adresa', 'broj_telefona', 'email', 'kontakt_osoba'
    ];
}
