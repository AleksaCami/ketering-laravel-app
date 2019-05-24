<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Magacin extends Model
{

    protected $table = 'magacini';
    protected $fillable = [
        'naziv', 'opis'
    ];

    public function kuhinja() {
        return $this->hasMany('App\Kuhinja');
    }

}
