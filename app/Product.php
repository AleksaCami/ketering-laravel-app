<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'naziv', 'mera', 'cena', 'opis', 'kuhinja_id', 'products_images'
    ];

    public function kuhinja() {
        return $this->belongsTo('App\Kuhinja');
    }

}
