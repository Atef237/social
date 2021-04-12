<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table = replys;
    protected $fillable = [
        'user_id', 'comment_id', 'text'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function comments(){
        return $this->belongsTo('App\Models\Comment');
    }
}
