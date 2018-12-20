<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\User;
use App\Friend;

class FriendController extends Controller
{
    //
    public function getUserPage($id){
    	$user = User::findOrFail($id);
    	return view('pages.user_page', ['user'=>$user]);
    }

    public function getMakeFriend($id){
    	$user = User::findOrFail($id);
    	$user_friend = new Friend();
    	$user_friend->user_id = Auth::user()->id;
    	$user_friend->friend_id = $id;

    	$user_friend->save();
    	return redirect('user_page/'.$id)->with('success', 'Kết bạn thành công');
    }

    public function getAddFriend($id)
    {
      $user = User::findOrFail($id);
      if(Auth::user()->id != $id && !Auth::user()->isFriend($user))
        Auth::user()->addFriend($user);
      return redirect('user_page/'.$id);
    }

    public function getRemoveFriend($id)
    {
      $user = User::findOrFail($id);
      if(Auth::user()->id != $id && Auth::user()->isFriend($user))
        Auth::user()->removeFriend($user);
      return redirect('user_page/'.$id);
    }
}
