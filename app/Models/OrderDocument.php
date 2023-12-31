<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDocument extends Model
{
    use HasFactory;
    public $guarded =[];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
