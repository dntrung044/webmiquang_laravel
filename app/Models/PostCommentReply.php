<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCommentReply extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'number_like',
        'comment_id',
        'commented_id',
        'content',
        'active',
    ];
    protected $table = 'post_comment_replies';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function comment()
    {
        return $this->belongsTo(PostComment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function commenter()
    {
        return $this->belongsTo(User::class, 'commented_id', 'id');
    }


    public function likes() {
        return $this->belongsToMany(User::class, 'reply_user', 'reply_id', 'user_id')->withTimestamps();
    }
}
