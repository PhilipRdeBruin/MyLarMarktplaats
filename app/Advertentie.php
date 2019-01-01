<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertentie extends Model {
    /**
    * de gebruiker waaronder de advertentie valt
    */
    public function users() {
        return $this->belongsTo('\App\User', 'verkoper_id');
    }
    
    /**
    * de rubriek waaronder de advertentie valt
    */
    public function rubrieks() {
        return $this->belongsTo('\App\Rubriek', 'rubriek_id');
    }

    /**
    * i.g.v. many_op_many relatie met advertenties 
    * de rubrieken waaronder de advertentie valt
    */
    /*
    public function rubrieks() {
        return $this->belongsToMany('App\Rubriek')
            ->using('App\AdvertentieRubriek');
    }
    */

    /**
    * de advertentie waaronder de foto valt
    */
    public function fotos() {
        return $this->hasMany('App\Foto', 'advertentie_id');
    }

    /**
    * de advertentie waaronder de bieding valt
    */
    public function biedingen() {
        return $this->hasMany('App\Bieding', 'advertentie_id');
    }
}
