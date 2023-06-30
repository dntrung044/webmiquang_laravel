<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    const STATUS_DONE = 1;
    const STATUS_DEFAULT = 0;

    protected $table = 'contacts';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'content',
        'status'
    ];
}
