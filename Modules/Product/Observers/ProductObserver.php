<?php

namespace Modules\Product\Observers;

use App\Enums\MediaCollection;
use Modules\Product\Entities\Product;

class ProductObserver
{
    public function created(Product $product)
    {
        $product->copyMedia(public_path('images\products\product.webp'))->toMediaCollection(MediaCollection::PRODUCT_COLLECTION_NAME);
    }

    public function updated(Product $product)
    {
    }

    public function deleted(Product $product)
    {
    }

    public function restored(Product $product)
    {
    }

    public function forceDeleted(Product $product)
    {
    }
}
