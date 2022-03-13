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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//一覧ページ
Route::get("library/index", "libraryController@index");

//貸出フォーム
Route::get('library/borrow', 'libraryController@borrowingForm');

//貸出処理
Route::post('library/borrow', 'libraryController@borrow');

//返却処理
Route::post('library/return', 'libraryController@returnBook');

//貸出履歴一覧表示
Route::get('library/history', 'libraryController@history');

//貸出中一覧表示
Route::get('library/borrowNow', 'libraryController@borrowNow');

//ログアウト
Route::get('library/logout', 'libraryController@logOut');