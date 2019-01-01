<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    /**
    * de advertentie waaronder de bieding valt
    */
    public function advertenties() {
        return $this->belongsTo('\App\Advertentie', 'advertentie_id');
    }
}
