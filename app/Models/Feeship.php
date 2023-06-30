<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feeship extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'district',
        'ward',
        'feeship'
    ];

    protected $primarykey = 'id ';
    protected $table = 'feeship';
}
