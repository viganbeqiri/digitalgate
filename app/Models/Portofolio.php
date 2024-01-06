<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;

    public $guarded = [];
    public $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return $this->cover_image ? (filter_var($this->cover_image, FILTER_VALIDATE_URL) ? $this->cover_image : asset('/' . $this->cover_image)) : null;
    }
}
