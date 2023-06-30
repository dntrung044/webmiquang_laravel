<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'type',
        'district_name'
    ];

    protected $primarykey = 'id ';
    protected $table = 'ward_dn';

    public function district()
    {
        return $this->hasOne(District::class, 'ward_id', 'district_name')
        ->withDefault(['name' => '']);
    }
}
