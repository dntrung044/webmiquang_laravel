<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'amount',
        'number',
        'condition',
        'date_start',
        'date_end',
        'status',
        'created_at',
        'updated_at',
    ];
    protected $table = 'coupons';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
