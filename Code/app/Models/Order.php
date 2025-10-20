<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable =  [
        'customer_name',
        'total_amount',
        'payment_status',
        'payment_method',
        'midtrans_transaction',
        'order_date',
        'user_id',
        'bookings_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bookings(): BelongsTo
    {
        return $this->belongsTo(Booking::class, 'bookings_id');
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItems::class);
    }
}
