
<?php 
    $fotos = \App\Foto::where('advertentie_id', $value->id)->get(); 
?>

<div class="container" style="margin-top:30px">
    <div class="card">       
        <div class="card-body card-header-mpl">
            <h5 class="card-title card-title-mpl">{{ $value->ad_titel }}</h5>
        </div>
        
        <ul class="list-group list-group-flush">
            <li class="list-group-item px-14 ad-omschr">{{ $value->ad_omschrijving }}</li>

                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm-6">
                            <i>verkoper:&nbsp;&nbsp;&nbsp;</i>
                            {{ $adv_data['naam'] }}
                        </div>
                        <div class="col-sm-6">
                            <i>woonplaats:&nbsp;&nbsp;&nbsp;</i>
                            <i>{{ $value->users->woonplaats }}</i>
                        </div>
                    </div>
                </li>

            @if($value->vis_email || $value->vis_tel)
            <li class="list-group-item">
                <div class="row">
                    @if($value->vis_email)
                        <div class="col-sm-6">
                            <i>email-adres:&nbsp;&nbsp;&nbsp;</i>
                            {{ $value->users->email }}
                        </div>
                    @endif
                    @if($value->vis_tel)
                        @if($value->users->mobiel)
                            <div class="col-sm-6">
                                <i>telefoonnr:&nbsp;&nbsp;&nbsp;</i>
                                <i>{{ $value->users->mobiel }}</i>
                            </div>
                        @elseif($value->users->telefoon)
                            <div class="col-sm-6">
                                <i>telefoonnr:&nbsp;&nbsp;&nbsp;</i>
                                <i>{{ $value->users->telefoon }}</i>
                            </div>
                        @endif
                    @endif
                </div>
            </li>
            @endif

            <li class="list-group-item">
                <div class="row">
                    <div class="col-sm-6">
                        {{ $adv_data['dagen_geleden'] }} geplaatst
                    </div>
                    <div class="col-sm-3">
                        <i>{{ $adv_data['opbod']}}</i>
                    </div>
                    <div class="col-sm-3">
                        <span class="prijs">€  {{ $value->prijs }} </span>
                    </div>
                </div>
            </li>
        </ul>

        <div class="card-fotos horizontal-scroll">
            @foreach($fotos as $key1 => $value1)
                <img class="adv_foto-mpl" id="adv-foto" 
                     src="{{ URL::to('/bestanden/fotos/' . $value1->fotonaam) }}"/>
            @endforeach
        </div>

        @if($value->users->gebr_naam != Auth::user()->gebr_naam)
            <div class="card-body bg_lgrijs rechts">
                <form method="post" action="{{action('AdvertentieController@invoeren')}}">
                    <span style="float:left">
                        Plaats jouw bod:&nbsp;&nbsp;&nbsp;
                        <input type="text" id="bieding" name="bieding" value="" placeholder="$  0.00">
                    </span>
                    <a href="#" class="btn btn-primary" style="width:120px">Bieden</a>
                </form>
            </div>
        @endif
    </div>

    <div class="bottom-margin" style="margin-top:60px">
        <!-- -->
    </div>
</div>