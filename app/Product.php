<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'naziv', 'mera', 'cena', 'opis', 'kuhinja_id'
    ];

    public function kuhinja() {
        return $this->belongsTo('App\Kuhinja');
    }

    public function order() {
        return $this->hasMany('App\Product');
    }

}
