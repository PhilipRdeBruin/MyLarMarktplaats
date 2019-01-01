
<?php /* ** Deze include zou niet nodig mogen zijn... (reeds in 'Head' ge-include...)
         ** is het echter toch!!  Vragen waarom...
      */ ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/functions/php_functies.php'); ?>

<div class="container" style="margin-top:75px">
    <table class="table table-sm" style="margin-bottom:0">
        <thead class="tabel-header">
            <tr>
                <th class="col-md-2 col-sm-12">Advertentie</th>
                <th class="col-md-1 col-sm-12">Rubriek</th>
                <th class="col-md-2 col-sm-12">Verkoper</th>
                <th class="col-md-4 col-sm-12">Omschrijving</th>
                <th class="col-md-1 col-sm-6">Prijs</th>
                <th class="col-md-1 col-sm-6">Geplaatst</th>
                <th class="col-md-1 col-sm-6">Afstand</th>
            </tr>
        </thead>
    </table>
</div>

<div class="container" id="overzichtstabel">
    <table class="table table-sm table-striped table-hover tabel-mpl">        
        <tbody>
            @foreach($advertenties as $key => $value)
                <?php $adv_data = fetch_advertentie_data($value) ?>
                <tr>
                    <td class="col-md-2 col-sm-12">{{ $value->ad_titel }}</td>
                    <td class="col-md-1 col-sm-12">{{ $value->rubrieks->rubr_naam }}</td>
                    <td class="col-md-2 col-sm-12">{{ $adv_data['naam'] }}</td>
                    <td class="col-md-4 col-sm-12">{{ $adv_data['omschrijving'] }}</td>
                    <td class="col-md-1 col-sm-6" align="center">€  {{ $value->prijs }}</td>
                    <td class="col-md-1 col-sm-6" align="center">{{ $adv_data['tijd'] }}</td>
                    <td class="col-md-1 col-sm-6" align="center">afstand</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
