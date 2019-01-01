
<?php

function fetch_advertentie_data($val) {
    $advdata['omschrijving'] = substr($val->ad_omschrijving, 0, 100) . "...";
    $vnm = $val->users->voornaam;
    $tv = $val->users->tussenv;
    $tv = ($tv != "") ? " " . $tv : "";
    $anm = $val->users->achternaam;
    $advdata['naam'] = $vnm . $tv . " " . $anm;
    $advdata['opbod'] = ($val->b_bij_opbod == 1) ? "bieden vanaf:" : "prijs:";
    $advdata['tijd'] = date_format($val->created_at,"d-m-Y");
    $advdata['dagen_geleden'] = get_verlopendagen($val->created_at);
 /*
    $dagen = get_verlopendagen($val->created_at);
    $dag = ($dagen == 1) ? "dag" : "dagen";
    $advdata['dagen_geleden'] = ($dagen >= 1) ? $dagen . " $dag geleden" : "vandaag";
*/

    return $advdata;
}

function fetch_bieding_data($val) {
    $vnm = $val->kopers->voornaam;
    $tv = $val->kopers->tussenv;
    $tv = ($tv != "") ? " " . $tv : "";
    $anm = $val->kopers->achternaam;
    $bdngdata['koper'] = $vnm . $tv . " " . $anm;
    $bdngdata['tijd'] = date_format($val->created_at,"d-m-Y");

    return $bdngdata;
}

function get_verlopendagen($dt) {
    $nu = date_create(date("Y-m-d H:i:s", time()));
    $toen = date_create($dt);
    $fnu = date_format($nu, "z");
    $ftoen = date_format($toen, "z");
    $dif = ($fnu >= $ftoen) ? $fnu - $ftoen : $fnu - $ftoen + 365;

    switch($dif) {
    case 0:
        $dif = "vandaag";
        break;
    case 1:
        $dif = "gister";
        break;
    case 2:
        $dif = "eergister";
        break;
    default:
        $dif = $dif . " dagen geleden";
    }
/*
    $dif = date_diff($toen, $nu);
    $dif = $dif->format("%a");
*/
    return $dif;
}

function init_ActiveLinks($arg) {

    $alnk['homepage'] = "";
    $alnk['login'] = "";
    $alnk['plaatsen'] = "";
    $alnk['profiel'] = "";

    $alnk[$arg] = "active";

    return $alnk;
}

/*  generieke functies */

function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
?>
