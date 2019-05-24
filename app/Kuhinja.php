<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kuhinja extends Model
{
    protected $table = 'kuhinje';
    protected $fillable = [
        'naziv', 'opis', 'magacin_id'
    ];

    public function magacin() {
        return $this->belongsTo('App\Magacin');
    }
}
