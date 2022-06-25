<?php

namespace App\Models;

use App\Enums\TransactionStatusEnum;
use App\Traits\Models\UnixTimestamps;
use App\Traits\Models\UuidTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory, UuidTrait, UnixTimestamps;
    protected $guarded = ['created_at', 'updated_at'];
    protected $casts = [
        'reply' => 'json',
        'status' => 'int'
    ];
    protected $appends = [
        'status_name'
    ];

    protected function statusName(): Attribute
    {
        return Attribute::make(
            get: function () {
                return (new TransactionStatusEnum())->get($this->status);
            },
        );
    }

    public function transactionPayment()
    {
        return $this->hasOne(TransactionPayment::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}
