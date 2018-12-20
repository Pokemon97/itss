<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\TinTuc;

class ModeratorController extends Controller
{
    //
    public function getNewsList(){
    	$tintuc = TinTuc::where('idUser', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(5);
    	return view('pages.news_list',['tintuc'=>$tintuc]);
    }
}
