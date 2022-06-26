<?php

namespace App\Models;

use App\Traits\Models\UnixTimestamps;
use App\Traits\Models\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionLog extends Model
{
    use HasFactory, UnixTimestamps, UuidTrait;

    protected $guarded = ['created_at', 'updated_at'];
    protected $casts = [
        'data' => 'json'
    ];
}
