<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'event_id',
        'napomena',
        'rok_izrade',
        'status',
        'prihvacena',
        'stanje_dostava'
    ];

    public function event() {
    return $this->belongsTo('App\Event');
}

    public function stavka() {
        return $this->hasMany('App\StavkaProizvoda');
    }
}
