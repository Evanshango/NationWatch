<?php

namespace App;

use App\Model\Comment;
use App\Model\Location;
use App\Model\Post;
use App\Model\Reply;
use App\Model\ReportComment;
use App\Model\ReportPost;
use App\Model\ReportReply;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'updated_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $relations = [
        'location',
        'comments'
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function replies(){
        return $this->hasMany(Reply::class);
    }

    public function setPasswordAttribute($value){
        $this->attributes['password'] = Hash::make($value);
    }

    public function reportPost(){
        return $this->hasOne(ReportPost::class);
    }

    public function reportComment(){
        return $this->hasOne(ReportComment::class);
    }

    public function reportReply(){
        return $this->hasOne(ReportReply::class);
    }
}
