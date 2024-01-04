<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    public $guarded = [];
    public $appends = ['order_type'];

    public function orderDocument(): HasOne
    {
        return $this->hasOne(OrderDocument::class);
    }

    public static function generateSerialNumber(): array|string
    {
        $template = 'INV/{date}/{randomString}';

        $serial = str_replace([
            '{date}',
            '{randomString}',
        ], [
            date('Ymd'),
            strtoupper(Str::random(4)),
        ], $template);

        if (self::where('order_no', $serial)->count()) {
            return self::generateSerialNumber();
        }

        return $serial;
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function orderDetail(): HasOne
    {
        return $this->hasOne(OrderDetail::class);
    }

    public function orderPayment(): HasOne
    {
        return $this->hasOne(OrderPayment::class);
    }

    public function orderIncubationDetail()
    {
        return $this->hasOne(OrderIncubationDetail::class);
    }

    public function orderIncubationDeck()
    {
        return $this->hasOne(OrderIncubationDeck::class);
    }

    public function getOrderTypeAttribute()
    {
        return $this->orderIncubationDetail ? 'incubation' : 'development';
    }
}
