
<?php /* ** Deze include zou niet nodig mogen zijn... (reeds in 'Head' ge-include...)
         ** is het echter toch!!  Vragen waarom...
      */ 
//      $msg = Auth::user()->gebr_naam;
//      echo '<script type="text/javascript">alert("' . $msg . '")</script>';    
?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/functions/php_functies.php'); ?>

<div class="container" style="margin-top:110px">
    <div class="card" style="width:75%">       
        <div class="card-body card-header-mpl">
            <h5 class="card-title card-title-mpl">Nieuwe advertentie</h5>
        </div>
        <form style="background:#eee" id="ad_invoerform" role="form" method="post" action="{{action('AdvertentieController@invoeren')}}">
<!--    <form style="background:#eee" id="ad_invoerform" role="form" method="post" action="#">  -->
            @csrf
<!--            <input type="text" name="dummy">  -->
            <input type="hidden" name="verkoper" value="{{ Auth::user()->gebr_naam }}">
            <div class="form-group row adv-form" style="padding-top:50px">
                <label class="col-sm-3 col-form-label" for="ad_titel">Advertentie naam <super>*</super></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="ad_titel" id="ad_titel">
                </div>
            </div>
            <div class="form-group row adv-form">
                <label class="col-sm-3 col-form-label" for="rubriek">Categorie <super>*</super></label>
                <div class="col-sm-5">
                    <select class="form-control" name="rubriek" id="rubriek">
                        <option value="leeg"></option>
                        @foreach($rubrieken as $value)
                            <option value="{{ $value->id }}">{{ $value->rubr_naam }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row adv-form">
                <label class="col-sm-3 col-form-label" for="art_prijs">Prijs <super>*</super></label>
                <div class="col-sm-2">
                    <input type="text" class="form-control adv-prijs" name="art_prijs" id="art_prijs" placeholder="€ 0.00" style="color:#46d">
                </div>
                <div class="col-sm-6 offset-sm-1">
                    <p class="adv-prijs_vanaf"><input type="checkbox" id="prijs_vanaf" name="prijs_vanaf" value="on">
                    <label class="col-sm-9 col-form-label" for="prijs_vanaf">Bieden mogelijk</label></p>
                    <p class="adv-prijs_vanaf"><input type="checkbox" id="prijs_vanaf2" name="prijs_vanaf2" value="on">
                    <label class="col-sm-11 col-form-label" for="prijs_vanaf">Bieding onder vraagprijs toegestaan</label></p>
                </div>
            </div>
            <hr/ class="grey" style="width:75%">
            <div class="form-group row adv-form">
                <div class="col-sm-6">
                    <input type="checkbox" id="show_email" name="show_email" value="on">
                    <label class="col-sm-9 col-form-label" for="show_email">Toon email-adres</label>
                </div>
                <div class="col-sm-6">
                    <input type="checkbox" id="show_tel" name="show_tel" value="on">
                    <label class="col-sm-11 col-form-label" for="show_tel">Toon telefoonnummer</label>
                </div>
            </div>
            <hr/ class="grey" style="width:75%">
            <div class="form-group row adv-form">
                <label class="col-sm-6 col-form-label" for="ad_tekst"><u>Omschrijving</u> <super>*</super></label>
                <div class="col-sm-12 px-14">
                    <textarea class="adv-tekst" id="advertentie" name="advertentie" rows="8" cols="112"></textarea>
                </div>
            </div>
            <div class="form-group row adv-form">
                <div class="col-sm-2 offset-sm-9">
                    <td><input type="submit" id="advertentieknop" name="advertentieknop" value="plaats advertentie"></td></tr>
                    <input type="hidden" id="advertentie_inp_hidden" value="plaats advertentie">                    
                </div>
            </div>
        </form>
        <br/>
        <div id="fotocontainer">
            <div class="row">
            <form action="{{ action('AdvertentieController@foto_uploaden') }}" method="post" enctype="multipart/form-data">
                <span  class="adv-fotolabel">Kies foto's om te uploaden:</span>
                <input type="file" name="file_to_upload" id="file_to_upload">
                <input type="submit" id="upload_submit" name="upload_submit" value="Upload Image">
            </form>
        </div>
        <div id="fotos"></div>
        <br/>
        <p id="advinv-btmlabel"><super>*</super>  <i>verplicht veld</i></p>
        </div>
    </div>
    <div class="bottom-margin" style="margin-top:60px">
        <!-- -->
    </div>
</div>
