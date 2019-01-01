<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rubriek extends Model {
    /**
    * de rubriek waaronder de advertentie valt
    */
    public function advertenties() {
        return $this->hasMany('App\Advertentie', 'rubriek_id');
    }

    /**
    * i.g.v. many_op_many relatie met advertenties 
    * de advertenties waartoe de rubrieken zijn toegekend
    */
    /*
    public function advertenties() {
        return $this->belongsToMany('App\Advertentie')
            ->using('App\AdvertentieRubriek');
    }
    */
}
