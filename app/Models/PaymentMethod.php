<?php

namespace App\Models;

use App\Traits\Models\PrimaryStringTrait;
use App\Traits\Models\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory, PrimaryStringTrait;
    protected $guarded = ['created_at', 'updated_at'];

    protected $casts = [
        'provider' => 'integer',
        'is_active' => 'boolean',
        'fee_in_percent' => 'float'
    ];
}
