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
    public function wards()
    {
        return $this->hasMany(Ward::class, 'district_id');
    }


    public function fees()
    {
        return $this->hasMany(Feeship::class, 'district_id');
    }
}
