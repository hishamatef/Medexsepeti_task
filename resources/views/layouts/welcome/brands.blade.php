
<div id="special_offers">
    <div class="row">
        <div class="col-md-2">
            <h3 style="color:white;" class="heading-title">Brands</h3>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach($brands as $brand)
                <div class="col-sm">
                    <span style="color:white;" title="{{ $brand->name }}">{{ $brand->name }}</span>
                </div>
            @endforeach
        </div>
    </div>
</div>
