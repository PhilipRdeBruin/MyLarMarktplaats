<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'gebr_naam', 'email', 'password',
        'voornaam', 'initialen', 'tussenv', 'achternaam',
        'straatnaam', 'huisnummer', 'postcode', 'woonplaats',
        'telefoon', 'mobiel', 'wachtwoord_sh',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
    * de gebruiker waaronder de advertentie valt
    */
    public function advertenties() {
        return $this->hasMany('App\Advertentie', 'verkoper_id');
    }

    /**
    * de gebruiker waaronder de bieding valt
    */
    public function biedingen() {
        return $this->hasMany('App\Bieding', 'koper_id');
    }
}
