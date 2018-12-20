<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;
use App\TinTuc;
use Cache;

class User extends Authenticatable
{
    use Notifiable;

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
        'password', 'remember_token',
    ];

    public function comment() {
        return $this->hasMany('App\Comment', 'idUser', 'id');
    }

    public function tintuc() {
        return $this->hasMany('App\Tintuc', 'idUser', 'id');
    }

    //public function friend() {
        //return $this->hasMany('App\Friend', 'user_id', 'id');
    //}

    public function friends()
    {
        return $this->belongsToMany('App\User', 'friend', 'user_id', 'friend_id');
    }

    public function addFriend(User $user)
    {
        $this->friends()->attach($user->id);
    }

    public function removeFriend(User $user)
    {
        $this->friends()->detach($user->id);
    }

    public function isFriend(User $user){

        if(!$this->friends->count()) return 0;

        foreach ($this->friends as $friend) {
            if($friend->id == $user->id) return 1;
        }
        return 0;
    }

    public function likes()
    {
        return $this->belongsToMany('App\TinTuc', 'likes', 'user_id', 'news_id');
    }

    public function addLike(TinTuc $tintuc){
        $this->likes()->attach($tintuc->id);
    }

    public function removeLike(TinTuc $tintuc)
    {
        $this->likes()->detach($tintuc->id);
    }

    public function hasLiked(TinTuc $tintuc){

        if(!$this->likes->count()) return 0;

        foreach ($this->likes as $news) {
            if($news->id == $tintuc->id) return 1;
        }
        return 0;
    }

    public function isOnline(){
        return Cache::has('active-user'.$this->id);
    }

    public function oneFriendLikePost(TinTuc $tintuc){
        foreach ($this->friends as $friend) {
            if($friend->hasLiked($tintuc)) return $friend;
        }
        return null;
    }
}
