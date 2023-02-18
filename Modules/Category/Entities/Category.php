<?php

namespace Modules\Category\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Database\factories\CategoryFactory;
use Modules\Product\Entities\Product;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasFactory,HasSlug;
    protected $guarded=[];
    protected $hidden=['created_at','updated_at'];
    protected $fillable = [
        'slug',
        'name',
        'parent_id'
    ];

    protected static function newFactory()
    {
        return CategoryFactory::new();
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
    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id','id');
    }

    public function products()
    {
        return $this->hasMany(Product::class,'category_id','id');
    }
}
