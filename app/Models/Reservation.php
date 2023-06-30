<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    const STATUS_DONE = 1;
    const STATUS_DEFAULT = 0;

    protected $table = 'reservations';
    protected $fillable = [
        'date',
        'time',
        'people',
        'date',
        'name',
        'email',
        'phone',
        'content',
        'status'
    ];
}
