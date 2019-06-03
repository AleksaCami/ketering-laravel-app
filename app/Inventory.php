<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventory';
    protected $fillable = [
        'naziv', 'mera', 'cena', 'pocetno_stanje', 'magacin_id', 'izgubljen', 'inventory_images'
    ];

    public function magacin() {
        return $this->belongsTo('App\Magacin');
    }

    public function stavka() {
        return $this->hasMany('App\StavkaInventara');
    }

}
