<?php

namespace Modules\Brand\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Brand\Database\factories\BrandFactory;
use Modules\Product\Entities\Product;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Brand extends Model
{
    use HasFactory,HasSlug;
    protected $guarded=[];
    protected $hidden=['created_at','updated_at'];
    protected $fillable = [
        'slug',
        'name'
    ];

    protected static function newFactory()
    {
        return BrandFactory::new();
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
    //Relation
    public function products()
    {
        return $this->hasMany(Product::class,'brand_id','id');
    }
}
