<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('thu', function() {
	//return view('admin.theloai.them');
//});

Route::get('admin/dangnhap','UserController@getDangNhapAdmin');
Route::post('admin/dangnhap','UserController@postDangNhapAdmin');
Route::get('admin/logout', 'UserController@getDangXuatAdmin');

Route::group(['prefix'=>'admin', 'middleware'=>'adminLogin'], function() {

	Route::group(['prefix'=>'tintuc'], function() {
		Route::get('danhsach', 'TinTucController@getDanhSach');

		Route::get('them', 'TinTucController@getUploadPost');

		Route::post('them', 'TinTucController@postUploadPost');

		Route::get('sua/{id}', 'TinTucController@getSua');

		Route::post('sua/{id}', 'TinTucController@postSua');

		Route::get('xoa/{id}', 'TinTucController@getXoa');

	});

	Route::group(['prefix'=>'comment'], function() {
		Route::get('xoa/{id}/{idTinTuc}', 'CommentController@getXoa');

	});

	Route::group(['prefix'=>'user'], function() {
		Route::get('danhsach', 'UserController@getDanhSach');

		Route::get('them', 'UserController@getThem');

		Route::post('them', 'UserController@postThem');

		Route::get('sua/{id}', 'UserController@getSua');

		Route::post('sua/{id}', 'UserController@postSua');

		Route::get('xoa/{id}', 'UserController@getXoa');

		Route::get('block/{id}', 'UserController@getBlock');

		Route::get('remove_block/{id}', 'UserController@getRemoveBlock');

	});

	Route::group(['prefix'=>'slide'], function() {
		Route::get('danhsach', 'SlideController@getDanhSach');

		Route::get('them', 'SlideController@getThem');

		Route::post('them', 'SlideController@postThem');

		Route::get('sua/{id}', 'SlideController@getSua');

		Route::post('sua/{id}', 'SlideController@postSua');

		Route::get('xoa/{id}', 'SlideController@getXoa');

	});

});

Route::get('dangnhap', 'PagesController@getDangnhap');

Route::post('dangnhap','PagesController@postDangnhap');

Route::get('dangxuat', 'PagesController@getDangxuat');



Route::group(['middleware'=>'login'], function() {

	Route::get('trangchu', 'PagesController@trangchu');

	Route::get('lienhe', 'PagesController@lienhe');

	Route::get('gioithieu', 'PagesController@gioithieu');

	Route::get('loaitin/{id}/{TenKhongDau}.html', 'PagesController@loaitin');

	Route::get('tintuc/{id}/{TieuDeKhongDau}.html', 'PagesController@tintuc');

	Route::post('comment/{id}', 'CommentController@postComment');

	Route::get('nguoidung', 'PagesController@getNguoidung');

	Route::post('nguoidung', 'PagesController@postNguoidung');

	Route::get('dangki', 'PagesController@getDangki');

	Route::post('dangki', 'PagesController@postDangki');

	Route::get('timkiem', 'PagesController@timkiem');

	Route:: get('likePost/{id}', 'TinTucController@getLike');

	Route::get('removeLikePost/{id}', 'TinTucController@getRemoveLike');

	// make friend

	Route::get('user_page/{id}', 'FriendController@getUserPage');

	Route::get('add_friend/{id}', 'FriendController@getAddFriend');

	Route::get('unfriend/{id}', 'FriendController@getRemoveFriend');

	// upload post
	Route::group(['prefix'=>'moderator', 'middleware'=>'moderatorUploadPost'], function() {
		Route::get('upload_post', 'TinTucController@getUploadPost');

		Route::post('upload_post', 'TinTucController@postUploadPost');

		Route::get('news_list', 'ModeratorController@getNewsList');

		Route::get('edit_post/{id}', 'TinTucController@getSua');

		Route::post('edit_post/{id}', 'TinTucController@postSua');
	});
});