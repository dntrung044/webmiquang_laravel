<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Product extends Model
{

    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'products';
    protected $primarykey = 'id';
    protected $guarded = [];

    protected $fillable = [
        'name',
        'description',
        'content',
        'cat_id',
        'price',
        'price_sale',
        'active',
        'thumb',
        'price',
    ];

    public function productCategory()
    {
        return $this->hasOne(ProductCategory::class, 'id', 'cat_id')
            ->withDefault(['name' => '']);
    }
}
