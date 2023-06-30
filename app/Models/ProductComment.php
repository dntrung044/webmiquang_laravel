<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductComment extends Model
{

    protected $fillable = [
        'product_id',
        'user_id',
        'content',
        'rating',
        'active',
    ];
    use HasFactory;

    const ACTIVE_DONE = 1;
    const ACTIVE_NOT_DEFAULT = 0;

    protected $table = 'product_comments';
    protected $primarykey = 'id';
    protected $guarded = [];

    public function product() {
        return $this->hasOne(Product::class, 'id', 'product_id')
        ->withDefault(['name' => '']);
        // return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
