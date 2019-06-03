<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StavkaProizvoda extends Model
{
    protected $table = 'stavkeproizvoda';
    protected $fillable = [
      'order_id', 'product_id', 'kolicina'
    ];

//    public function product() {
//        return $this->hasOne('App\Product');
//    }
//
//    public function order() {
//        return $this->belongsTo('App\Order');
//    }
}
