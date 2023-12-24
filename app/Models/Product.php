<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $guarded = [];
    public $appends = ['image_url', 'has_child_product'];

    const OUTRIGHT = 1;
    const MONTHLY_SUBSCRIPTION = 2;
    const QUOTE = 3;
    const PRICING_SCHEMES = [
        self::OUTRIGHT => 'Outright',
        self::MONTHLY_SUBSCRIPTION => 'Monthly Subscription',
        self::QUOTE => 'Quote',
    ];

    public function getAdditionalInfoAttribute($value)
    {
        return json_decode($value);
    }

    public function getImageUrlAttribute()
    {
        return $this->image ? (filter_var($this->image, FILTER_VALIDATE_URL) ? $this->image : asset('/' . $this->image)) : null;
    }

    public function childProduct()
    {
        return $this->hasMany(Product::class, 'parent_id');
    }

    public function parentProduct()
    {
        return $this->belongsTo(Product::class, 'parent_id');
    }

    public function getHasChildProductAttribute()
    {
        return $this->childProduct()->count() > 0;
    }

    public function getHasParentProductAttribute()
    {
        return $this->parentProduct ? true : false;
    }

    public function getChildSlugAttribute()
    {
        return $this->childProduct()->count() > 0 ? $this->childProduct()->pluck('slug')->toArray() : null;
    }

    public function getParentSlugAttribute()
    {
        return $this->parentProduct ? $this->parentProduct->slug : null;
    }
}
