<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionCategory extends Model
{
    use HasFactory;
    protected $table = 'permission_categories';
    protected $primarykey = 'id';
    protected $guarded = [];

    protected $fillable = [
        'name',
        'parent_id',
    ];

    public function functions()
    {
        return $this->hasMany(PermissionCategory::class, 'parent_id', 'id');
    }
}
