
<div class="row" style="margin-top:30px">
    @include('includes.overzichtstabel')
</div>

<hr class="hor-lijn"/>

<div class="row" style="margin-top:30px">
    @foreach($advertenties as $key => $value)
        <?php $adv_data = fetch_advertentie_data($value) ?>

        <div class="col-sm-6 offset-sm-1 container">
            @include('includes.advertenties')
        </div>

        <aside class="col-sm-4">
            @include('includes.aside')
        </aside>

        <div class="col-sm-1">
            <!-- -->
        </div>
    @endforeach
</div>