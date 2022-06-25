<?php

namespace App\Models;

use App\Traits\Models\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, UuidTrait;
    protected $guarded = ['created_at', 'updated_at'];
    protected $casts = [
        'is_available_checking' => 'boolean',
        'is_buyer_product_status' => 'boolean',
        'is_seller_product_status' => 'boolean',
        'is_unlimited_stock' => 'boolean',
        'is_multi' => 'boolean',
        'details' => 'json'
    ];

    public function scopePrepaid($query)
    {
        return $query->where('cluster', 'prepaid');
    }

}
