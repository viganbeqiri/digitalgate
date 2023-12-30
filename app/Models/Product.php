<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $guarded = [];
    public $appends = ['image_url', 'has_child_product', 'has_parent_product', 'product_type'];

    const OUTRIGHT = 1;
    const MONTHLY_SUBSCRIPTION = 2;
    const QUOTE = 3;
    const PRICING_SCHEMES = [
        self::OUTRIGHT => 'Outright',
        self::MONTHLY_SUBSCRIPTION => 'Monthly Subscription',
        self::QUOTE => 'Quote',
    ];

    const DEVELOPMENT = 1;
    const DESIGN = 2;
    const TYPE = [
        self::DEVELOPMENT => 'Development Service',
        self::DESIGN => 'Design Service',
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

    public function getHasChildProductAttribute(): bool
    {
        return $this->childProduct()->count() > 0;
    }

    public function getHasParentProductAttribute(): bool
    {
        return (bool)$this->parentProduct;
    }

    public function getChildSlugAttribute()
    {
        return $this->childProduct()->count() > 0 ? $this->childProduct()->pluck('slug')->toArray() : null;
    }

    public function getParentSlugAttribute()
    {
        return $this->parentProduct ? $this->parentProduct->slug : null;
    }

    public function getProductTypeAttribute()
    {
        return self::TYPE[$this->type];
    }
}
