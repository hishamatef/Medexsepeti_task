
<div id="special_offers">
    <div class="row">
        <div class="col-md-2">
            <h3 style="color:white;" class="heading-title">Products that just arrived</h3>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach($lastVisitedProducts as $product)
                <div class="col-sm">
                    <span style="color:white;" title="{{ $product->name }}">{{ $product->name }}</span>
                </div>
            @endforeach
        </div>
    </div>
</div>
