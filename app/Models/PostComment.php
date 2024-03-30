<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'user_id',
        'content',
        'number_like',
        'active',
    ];
    protected $table = 'post_comments';
    protected $primaryKey = 'id';
    protected $guarded = [];

    const ACTIVE_DONE = 1;
    const ACTIVE_NOT_DEFAULT = 0;

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function post() {
        return $this->hasOne(Post::class, 'id', 'post_id')
        ->withDefault(['name' => '']);
    }

    public function replies() {
        return $this->hasMany(PostCommentReply::class, 'comment_id', 'id');
    }

    public function likes() {
        return $this->belongsToMany(User::class, 'comment_user', 'comment_id', 'user_id')->withTimestamps();
    }
}
