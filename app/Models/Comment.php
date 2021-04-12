<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = comments;

    protected $fillable = [
      'user_id' , 'text' , 'post_id'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function reply(){
        return $this->hasMany('App\Models\Reply');
    }

    public function post(){
        return $this->belongsTo('App\Models\Post');
    }
}
