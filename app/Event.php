<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'eventi';
    protected $fillable = [
        'naziv', 'datum_pocetka', 'vreme_pocetka', 'datum_zavrsetka', 'vreme_zavrsetka', 'klijent_id'
    ];


    /*
     * Relationship
     * Svaki evnet pripada nekom klijentu.
     * Pravimo relationship jedan prema vise, posto jedan klijent moze imati
     * vise evenata, dok jedan event moze pripadati samo jednom klijentu.
     * */
    public function klijent() {
        return $this->belongsTo('App\Klijent');
    }

}
