<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aboutus extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'address',
        'email',
        'phone',
        'openH',
        'thumb',
        'map'
    ];
    protected $table = 'aboutus';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
