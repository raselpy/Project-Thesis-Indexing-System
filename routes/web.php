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

// start student controller
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

Route::get('/project','ProjectController@index')->name('project');
Route::get('/project/details/{id}','ProjectController@detail')->name('project_detail');
Route::get('/thesis','ThesisController@index')->name('thesis');
Route::get('/thesis/details/{id}','ThesisController@detail')->name('thesis_detail');





Route::get('/thesis/details/comment','CommentController@store')->name('submit_comment');




Route::get('/','ProjectIdeaController@index')->name('idea_project');
Route::get('/project_idea/details/{id}','ProjectIdeaController@detail')->name('project_idea_detail');

Route::get('/idea/thesis','ThesisIdeaController@index')->name('idea_thesis');
Route::get('/thesis_idea/details/{id}','ThesisIdeaController@detail')->name('thesis_idea_detail');



Route::get('/category','CategoryController@index')->name('category');
Route::post('/category/submit','CategoryController@submit_category')->name('submit_category');

Route::get('/project/submit/form','FileSubmitController@submit_files_form')->name('submit_files_form');
Route::post('/project/store','FileSubmitController@store_files')->name('store_files');

Route::get('/idea/submit/form','IdeaSubmitController@submit_idea_form')->name('submit_idea_form');
Route::post('/idea/store','IdeaSubmitController@store_idea')->name('store_idea');

// end student controller

// start admin/teacher controller

Route::get('/admin/index','AdminController@index')->name('admin');
Route::get('/admin/idea','AdminController@idea')->name('admin.idea');
Route::get('/idea/delete/{id}','AdminController@idea_delete')->name('idea.delete');
Route::get('/admin/student','AdminController@student')->name('admin.student');
Route::get('/admin/teacher','AdminController@teacher')->name('admin.teacher');
Route::get('/admin/delete/{id}','AdminController@delete')->name('admin.delete');
Route::get('/admin/update/{id}','AdminController@update')->name('admin.update');

Route::get('/admin/permission','PermissionController@permission')->name('permission');
Route::post('/thesis/dic/download','AdminController@downloadDocFile')->name('downloadDocFile');
Route::post('/thesis/zip/download','AdminController@downloadZipFile')->name('downloadZipFile');

// end admin/teacher controller
Route::group(['middleware'=>['auth']], function (){
   Route::post('favorite/{idea}/add','FavoriteController@add')->name('idea.favorite');
   Route::get('favorite/index','FavoriteController@index')->name('favorite');
   Route::post('comment/{idea}','CommentController@store')->name('comment.store');
});


