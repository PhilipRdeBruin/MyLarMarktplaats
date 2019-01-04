<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Rubriek;
use App\Gebruiker;


class AdvertentieController extends Controller
{
    public function index() {
        // get all the customers
        $advertenties = \App\Advertentie::all();
        $advertenties = $advertenties->SortByDesc('id');

        $biedings = \App\Bieding::all();

        // laad de view and geeft de advertenties door
        return \View::make('pages.index')
            ->with('advertenties', $advertenties);  
    }

    public function plaatsen() {
        // haalt alle rubrieken op
        $rubrieken = \App\Rubriek::all();
        
        // laad de view and geeft de rubrieken door
        return \View::make('pages.plaatsen')
            ->with('rubrieken', $rubrieken);;  
    }

    public function invoeren_adv() {
        // slaat de nieuwe advertentie op in de database
        $advertentie = new \App\Advertentie;

        $rubriek = \App\Rubriek::find(Input::get('rubriek'));
        $gebr_nm = Input::get('verkoper');
        $verkoper = \App\User::where('gebr_naam', $gebr_nm)->first(); 

        $advertentie->rubriek_id            = $rubriek->id;
        $advertentie->verkoper_id           = $verkoper->id;
        $advertentie->ad_titel              = Input::get('ad_titel');
        $advertentie->ad_omschrijving       = Input::get('advertentie');
        $advertentie->prijs                 = Input::get('art_prijs');
        $advertentie->b_bij_opbod           = Input::get('prijs_vanaf') == 'on' ? 1 : 0;
        $advertentie->b_onder_vraagprijs    = Input::get('prijs_vanaf2') == 'on' ? 1 : 0;
        $advertentie->vis_email             = Input::get('show_email') == 'on' ? 1 : 0;
        $advertentie->vis_tel               = Input::get('show_tel') == 'on' ? 1 : 0;
        $advertentie->ad_status             = "open";

        $advertentie->save();

        // herleidt terug naar de overzichtspagina
        return \Redirect::to('index');
    }

    public function invoeren_bod($advertentie_id, $user_id) {
        // slaat de nieuwe bieding op in de database

        $vraagprijs = input::get('vraagprijs');
        $bij_opbod = input::get('bij_opbod');
        $onder_vraagprijs = input::get('onder_vraagprijs');
        $max_bod = \App\Bieding::where('advertentie_id', $advertentie_id)->max('bod');

        $advertentie = new \App\Advertentie;
        $bieding = new \App\Bieding;

        $bieding->advertentie_id            = $advertentie_id;
        $bieding->koper_id                  = $user_id;
        $bieding->bod                       = Input::get('bieding');

        if ($bieding->bod <= $max_bod) {
            return \Redirect::to('index');
        } 
        if ($onder_vraagprijs == 0 && $bieding->bod < $vraagprijs) {
            $msg = "Biedingen onder de vraagprijs worden niet geaccepteerd.";
            echo '<script type="text/javascript">alert("' . $msg . '")</script>'; 
            return \Redirect::to('index');
        }
        if ($bij_opbod == 0 && $bieding->bod >= $vraagprijs) {
            $advertentie->ad_status         = "voorlopig";
            // nog acties bepalen over hoe hier mee om te gaan...
        }


        $bieding->save();

        // herleidt terug naar de overzichtspagina
        return \Redirect::to('index');
    }

    public function foto_uploaden() {
        $msg = "Hallo";
        echo '<script type="text/javascript">alert("' . $msg . '")</script>';
        die();
    }
}
