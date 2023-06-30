<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;

    protected $table = 'post_categories';
    protected $primaryKey = 'id';
    protected $guarded = [];

    protected $fillable = [
        'name',
        'active'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
}
