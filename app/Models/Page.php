<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    public $guarded = [];
    public $appends = ['next_page', 'previous_page'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getNextPageAttribute()
    {
        $next = $this->category->pages()->where('id', '>', $this->id)->first();
        if ($next) {
            return 'services.' . $next->slug;
        }
        return null;
    }

    public function getPreviousPageAttribute()
    {
        $prev = $this->category->pages()->where('id', '<', $this->id)->orderBy('id', 'desc')->first();
        if ($prev) {
            return 'services.' . $prev->slug;
        }
        return null;
    }

    public function getContentsAttribute($value)
    {
        $contents = json_decode($value);

        return collect($contents)->map(function ($content) {
            $image = filter_var($content->image, FILTER_VALIDATE_URL) ? $content->image : asset('/' . $content->image);
            return [
                'title' => $content->title,
                'description' => $content->description,
                'image' => $image
            ];
        });
    }
}
