<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stavka extends Model
{
    protected $table = 'stavke';
    protected $fillable = [
      'order_id', 'product_id', 'kolicina'
    ];

    public function product() {
        return $this->hasOne('App\Product');
    }

    public function order() {
        return $this->belongsTo('App\Order');
    }
}
