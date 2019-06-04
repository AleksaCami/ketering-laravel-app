<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class StavkaInventara extends Model
{
    protected $table = 'stavke_inventara';
    protected $fillable = [
        'inventar_id', 'order_id', 'kolicina'
    ];
}
