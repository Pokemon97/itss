<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    //
    protected $table = "tintuc";

    public function comment() {
    	return $this->hasMany('App\Comment', 'idTinTuc', 'id');
    }

    public function user() {
    	return $this->belongsTo('App\User', 'idUser', 'id');
    }

    public function likeByUser(){
        return $this->belongsToMany('App\User', 'likes', 'news_id', 'user_id');
    }
}
