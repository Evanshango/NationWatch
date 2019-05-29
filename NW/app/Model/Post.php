<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $relations = [
        'comments',
        'upvotes',
        'downvotes'
    ];

    protected $withCount = [
        'comments',
        'upvotes',
        'downvotes'
    ];

    protected $hidden = [
        'updated_at'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tag1(){
        return $this->belongsTo(Tag::class, 'tag1_id');
    }

    public function tag2(){
        return $this->belongsTo(Tag::class, 'tag2_id');
    }

    public function tag3(){
        return $this->belongsTo(Tag::class,'tag3_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function upvotes(){
        return $this->hasMany(Upvote::class);
    }

    public function downvotes(){
        return $this->hasMany(Downvote::class);
    }

}
