<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Klijent extends Model
{
    protected $table = 'klijenti';
    protected $fillable = [
        'naziv', 'adresa', 'broj_telefona', 'email', 'kontakt_osoba'
    ];

    /*
     * Relationship
     * Svaki evnet pripada nekom klijentu.
     * Pravimo relationship jedan prema vise, posto jedan klijent moze imati
     * vise evenata, dok jedan event moze pripadati samo jednom klijentu.
     * */
    public function event() {
        return $this->hasMany('App\Event');
    }
}
