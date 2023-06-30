<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'address',
        'content',
        'payment_type',
        'status',
        'method',
        'total_price',
        'total_item',
        'time',
        'day'
    ];

    const STATUS_DEFAULT = "DEFAULT";
    const STATUS_DEVLIVERING = "DEVLIVERING";
    const STATUS_DONE = "DONE";
    const STATUS_CANCELLED = "CANCELLED";

    public function carts()
    {
        return $this->hasMany(Cart::class, 'transaction_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
