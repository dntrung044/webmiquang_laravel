<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $table = 'permissions';
    protected $primarykey = 'id';
    protected $guarded = [];

    protected $fillable = [
        'parent_id',
        'name',
        'description',
        'key_code',
        'function'
    ];
}
