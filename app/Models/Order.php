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
    public $appends = ['order_type', 'order_status'];

    public function orderDocument(): HasMany
    {
        return $this->HasMany(OrderDocument::class);
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
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
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

    public function getOrderStatusAttribute()
    {
        // ('0 = draft, 1 = pending, 2 = processing, 3 = completed'
        return $this->status == 0 ? 'draft' : ($this->status == 1 ? 'pending' : ($this->status == 2 ? 'processing' : 'completed'));
    }

    public function getDocumentsAttribute()
    {
        $detail = $this->orderDetail;
        $documents = $this->orderDocument;
        $file = [
            [
                'name' => 'business_logo_url',
                'url' => url('') . '/storage' . '/' . $detail->business_logo_url
            ],
            [
                'name' => 'content_zip_url',
                'url' => url('') . '/storage' . '/' . $detail->content_zip_url
            ],
            [
                'name' => 'company_profile_url',
                'url' => url('') . '/storage' . '/' . $detail->company_profile_url
            ]
        ];

        if ($documents) {
            $doc = $documents->map(function ($document) {
                return [
                    [
                        'name' => 'license_file_url',
                        'url' => url('') . '/storage' . '/' . $document->license_file_url
                    ], [
                        'name' => 'nda_file_url',
                        'url' => url('') . '/storage' . '/' . $document->nda_file_url
                    ]
                ];
            })->flatten(1)->toArray();
            array_push($file, ...$doc);
        }
        return $file;
    }
}
