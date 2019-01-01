
<?php 
    $biedings = \App\Bieding::where('advertentie_id', $value->id)->get(); 
    $biedings = $biedings->SortByDesc('id');
?>


    <div class="container" style="margin-top:30px">
    <h5 class="header-biedingen"><b><i>Biedingen:</i></b></h5>
    <table table class="table table-sm table-striped">
        <thead class="tabel-header">
            <tr class="px-16">
                <th>Naam</th>
                <th>Bod</th>
                <th>Datum</th>
            </tr>
        </thead>

        @foreach($biedings as $key2 => $value2)
            <?php $bod_data = fetch_bieding_data($value2); ?>
            
            <tbody>
                <tr>
                    <td>{{ $bod_data['koper'] }}</td>
                    <td>€  {{ $value2->bod }}</td>
                    <td>{{ $bod_data['tijd']  }}</td>
                </tr>
            </tbody>
        @endforeach
    </table>

    <div class="bottom-margin" style="margin-top:60px">
        <!-- -->
    </div>
</div>

