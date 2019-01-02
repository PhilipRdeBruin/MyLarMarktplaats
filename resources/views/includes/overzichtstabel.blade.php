
<?php /* ** Deze include zou niet nodig mogen zijn... (reeds in 'Head' ge-include...)
         ** is het echter toch!!  Vragen waarom...
      */ ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/functions/php_functies.php'); ?>

<div class="container" style="margin-top:75px">
    <table class="table table-sm" style="margin-bottom:0">
        <thead class="tabel-header">
            <tr>
                <th style="width:16.5%">Advertentie</th>
                <th style="width:10.5%">Rubriek</th>
                <th style="width:16.5%">Verkoper</th>
                <th style="width:33%">Omschrijving</th>
                <th style="width:8%;align=:center">Prijs</th>
                <th style="width:7%;align=:center">Geplaatst</th>
                <th style="width:8%;align=:center">Afstand</th>
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
                    <td style="width:17%">{{ $value->ad_titel }}</td>
                    <td style="width:8%">{{ $value->rubrieks->rubr_naam }}</td>
                    <td style="width:17%">{{ $adv_data['naam'] }}</td>
                    <td style="width:34%">{{ $adv_data['omschrijving'] }}</td>
                    <td style="width:8%;align=:center">€  {{ $value->prijs }}</td>
                    <td style="width:8%;align=:center">{{ $adv_data['tijd'] }}</td>
                    <td style="width:8%;align=:center">afstand</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
