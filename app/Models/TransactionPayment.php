<?php

namespace App\Models;

use App\Traits\Models\UnixTimestamps;
use App\Traits\Models\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionPayment extends Model
{
    use HasFactory, UuidTrait, UnixTimestamps;
    protected $guarded = ['created_at', 'updated_at'];
}
