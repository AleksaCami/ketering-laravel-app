<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'naziv', 'mera', 'cena', 'opis', 'kategorija'
    ];

}
