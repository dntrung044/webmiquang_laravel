<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feeship extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'district_id',
        'ward_id',
        'feeship'
    ];

    protected $primarykey = 'id ';
    protected $table = 'fees';

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }
    public function ward()
    {
        return $this->belongsTo(Ward::class, 'ward_id');
    }
}
