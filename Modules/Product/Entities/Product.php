<?php

namespace Modules\Product\Entities;

use App\Enums\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Brand\Entities\Brand;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Modules\Category\Entities\Category;
use Modules\Product\Database\factories\ProductFactory;
use App\Enums\MediaCollection;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia,HasSlug;
    protected $guarded=[];
    protected $hidden=['created_at','updated_at'];
    protected $fillable = [
        'name',
        'slug',
        'barcode',
        'short_description',
        'long_description',
        'price',
        'price_after_discount',
        'quantity',
        'discount',
        'discount_type',
        'discount_start_at',
        'discount_end_at',
        'status',
        'category_id',
        'brand_id',
        'views'
    ];
    protected $casts = [
        'discount_start_at' => 'datetime',
        'discount_end_at' => 'datetime'
    ];

    protected static function newFactory()
    {
        return ProductFactory::new();
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    //Relations
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id','id');
    }
    public function lastVisitedByUser()
    {
        return $this->hasOne(User::class,'last_visited_product','id');
    }

    //Scopes
    public function scopeUserLastVisited($query)
    {
        return $query->whereHas('lastVisitedByUser');
    }
    public function scopeActive($query)
    {
        return $query->where('status', Status::ACTIVE);
    }

    public function scopeValidOffers($query)
    {
        return $query->whereDate('discount_start_at', '<=', now()->toDateTimeString())
            ->whereDate('discount_end_at', '>=', now()->toDateTimeString());
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(MediaCollection::PRODUCT_COLLECTION_NAME);
    }
}
