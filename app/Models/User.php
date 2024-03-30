<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'district',
        'ward',
        'street',
        'password',
        'google_id',
        'facebook_id',
        'active',
        'level',
        'avatar',
        'fee',
    ];

    protected $primarykey = 'id ';
    protected $table = 'users';

    const STATUS_DONE = 1;
    const STATUS_DEFAULT = 0;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    public function likedComments() {
        return $this->belongsToMany(PostComment::class, 'comment_user', 'user_id', 'comment_id')->withTimestamps();
    }
    public function likedReplies() {
        return $this->belongsToMany(PostCommentReply::class, 'reply_user', 'user_id', 'reply_id')->withTimestamps();
    }

    public function productComment() {
        return $this->hasMany(ProductComment::class, 'user_id', 'id');
    }

    public function PostLike() {
        return $this->hasMany(ProductComment::class, 'user_id', 'id');
    }

    public function roles() {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function checkPermissionAccess($pemissionCheck)
    {
        $roles = auth()->user()->roles;

        foreach ($roles as $role) {
            $permissions = $role->permissions;
            if ($permissions->contains('key_code', $pemissionCheck)) {
                return true;
            }
        }
        return false;
    }



}
