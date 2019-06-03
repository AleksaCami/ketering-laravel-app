<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class StavkaInventara extends Model
{
    protected $table = 'stavke_inventara';
    protected $fillable = [
        'magacin_id', 'item_id', 'kolicina'
    ];
}
