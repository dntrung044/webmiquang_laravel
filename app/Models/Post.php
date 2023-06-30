<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'description',
        'content',
        'category_id',
        'active',
        'thumb',
        'view'
    ];
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function postCategory()
    {
        return $this->hasOne(PostCategory::class, 'id', 'category_id')
        ->withDefault(['name' => '']);
    }

    public function comments() {
        return $this->hasMany(PostComment::class, 'post_id', 'id')->orderBy('id', 'DESC');
    }

    /**
     * The roles that belong to the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function likedUsers()
    {
        return $this->belongsToMany(User::class);
    }
}
