<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public $guarded = [];
    public $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return $this->image ? (filter_var($this->image, FILTER_VALIDATE_URL) ? $this->image : asset('/' . $this->image)) : null;
    }
}
