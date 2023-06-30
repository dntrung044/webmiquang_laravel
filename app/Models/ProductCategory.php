<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = 'productcategories';
    protected $primaryKey = 'id';
    protected $guarded = [];
    
    protected $fillable = [
        'name',
        'active'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'cat_id', 'id');
    }
}
