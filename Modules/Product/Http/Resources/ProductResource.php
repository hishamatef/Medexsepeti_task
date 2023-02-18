<?php

namespace Modules\Product\Http\Resources;

use App\Enums\MediaCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'category' =>[
                'id' => $this->category->id,
                'name' => $this->category->name
            ],
            'brand' =>[
                'id' => $this->brand->id,
                'name' => $this->brand->name
            ],
            'barcode' => $this->barcode,
            'short_description' => $this->short_description,
            'long_description' => $this->long_description,
            'price' => $this->price,
            'price_after_discount' => $this->price_after_discount,
            'quantity' => $this->quantity,
            'views' => $this->views,
            'discount' => $this->discount,
            'discount_type' => $this->discount_type,
            'discount_start_at' => $this->discount_start_at,
            'discount_end_at' => $this->discount_end_at,
            'status' => $this->status,
            'product_image' => $this->getMedia(MediaCollection::PRODUCT_COLLECTION_NAME)->first()->getUrl(),
        ];
    }
}
