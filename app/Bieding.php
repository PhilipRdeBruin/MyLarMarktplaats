<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bieding extends Model
{
    /**
    * de advertentie waaronder de bieding valt
    */
    public function advertenties() {
        return $this->belongsTo('\App\Advertentie', 'advertentie_id');
    }

    /**
    * de user (koper) waaronder de bieding valt
    */
    public function kopers() {
        return $this->belongsTo('\App\User', 'koper_id');
    }
}
