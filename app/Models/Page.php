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

    public function parent()
    {
        return $this->belongsTo(Page::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Page::class, 'parent_id');
    }

    public function getNextPageAttribute()
    {
        if (empty($this->category_id)) {
            return null;
        }
        $next = $this->category->pages()->where('id', '>', $this->id)->first();
        if ($next) {
            return 'services.' . $next->slug;
        }
        return null;
    }

    public function getPreviousPageAttribute()
    {
        if (empty($this->category_id)) {
            return null;
        }
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
            $imageSource = $content->image ?? null;

            $image = $imageSource ? (filter_var($content->image, FILTER_VALIDATE_URL) ? $content->image : asset('/' . $content->image)) : null;
            return [
                'title' => $content->title,
                'description' => $content->description,
                'image' => $image,
                'link' => $content->link ?? null,
                'subtittle' => $content->subtitle ?? null,
            ];
        });
    }
    public function getSliderContentsAttribute($value)
    {
        $contents = json_decode($value);

        return collect($contents)->map(function ($content) {
            $image = filter_var($content->media_url, FILTER_VALIDATE_URL) ? $content->media_url : asset('/' . $content->media_url);
            return [
                'media_url' => $image ?? null,
                'title' => $content->title ?? null,
                'subtitle' => $content->subtitle ?? null,
                'link' => $content->link ?? null,
            ];
        });
    }
}
