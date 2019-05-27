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
        'magacin_id',
        'klijent_id',
        'kuhinja_id',
        'status',
        'stavke_id'
    ];

    public function kuhinja() {
        return $this->belongsTo('App\Kuhinja');
    }

    public function klijent() {
        return $this->belongsTo('App\Klijent');
    }

    public function magacin() {
        return $this->belongsTo('App\Magacin');
    }

    public function event() {
        return $this->belongsTo('App\Event');
    }

    public function stavka() {
        return $this->hasMany('App\Stavka');
    }
}
