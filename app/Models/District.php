<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [  
        'name',
        'type'
    ];

    protected $primarykey = 'id';
    protected $table = 'district_dn';

}