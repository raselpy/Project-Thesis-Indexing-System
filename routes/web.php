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

Route::get('/project','ProjectController@project')->name('project');
Route::get('/project/search','ProjectController@project_search')->name('project_search');

Route::get('/project/details/{id}','ProjectController@detail')->name('project_detail');
Route::get('/thesis','ThesisController@thesis')->name('thesis');
Route::get('/thesis/search','ThesisController@thesis_search')->name('thesis_search');
Route::get('/thesis/details/{id}','ThesisController@detail')->name('thesis_detail');





Route::get('/thesis/details/comment','CommentController@store')->name('submit_comment');




Route::get('/','ProjectIdeaController@index')->name('idea_project');
Route::get('/idea_project/search','ProjectIdeaController@idea_project_search')->name('idea_project.search');
Route::get('/project_idea/details/{id}','ProjectIdeaController@detail')->name('project_idea_detail');

Route::get('/idea/thesis','ThesisIdeaController@index')->name('idea_thesis');
Route::get('/idea_thesis/search','ThesisIdeaController@idea_thesis_search')->name('idea_thesis.search');
Route::get('/thesis_idea/details/{id}','ThesisIdeaController@detail')->name('thesis_idea_detail');



Route::get('/category','CategoryController@index')->name('category');
Route::post('/category/submit','CategoryController@submit_category')->name('submit_category');

Route::get('/project/submit/form','FileSubmitController@submit_files_form')->name('submit_files_form');
Route::post('/project/store','FileSubmitController@store_files')->name('store_files');

Route::get('/idea/submit/form','IdeaSubmitController@submit_idea_form')->name('submit_idea_form');
Route::post('/idea/store','IdeaSubmitController@store_idea')->name('store_idea');

// student Dashboard
Route::get('/student/dashboard','StudentDashboardController@index')->name('student.dashboard');
Route::get('/student/my_project','StudentDashboardController@project')->name('student.project');
Route::get('/student/MyIdea','StudentDashboardController@idea')->name('student.MyIdea');
Route::get('/student/file/search','StudentDashboardController@file_search')->name('student.search.file');
Route::get('/student/idea/search','StudentDashboardController@idea_search')->name('student.search.idea');
Route::get('/student/favorite/idea/search','StudentDashboardController@favorite_idea_search')->name('student.search.farorite.idea');
//End student Dashboard

// end student controller

// start admin/teacher controller

Route::get('/admin/all_project/files','AdminController@index')->name('admin');
Route::get('admin/project/search','AdminController@project_search')->name('admin_project_search');

Route::get('/admin/idea','AdminController@idea')->name('admin.idea');
Route::get('admin/idea/search','AdminController@idea_search')->name('admin_idea_search');

Route::get('/idea/delete/{id}','AdminController@idea_delete')->name('idea.delete');
Route::get('/file/delete/{id}','AdminController@file_delete')->name('file.delete');
Route::get('/admin/student','AdminController@student')->name('admin.student');
Route::get('/admin/teacher','AdminController@teacher')->name('admin.teacher');
Route::get('/admin/delete/{id}','AdminController@delete')->name('admin.delete');
Route::get('/admin/update/{id}','AdminController@update')->name('admin.update');
Route::get('/admin/my_project','AdminController@project')->name('admin.MyProject');
Route::get('admin/myfiles/search','AdminController@myfile_search')->name('admin_myfile_search');
Route::get('/admin/my_idea','AdminController@my_idea')->name('admin.MyIdea');
Route::get('admin/myidea/search','AdminController@myidea_search')->name('admin_myidea_search');
Route::get('/admin/favorite','AdminController@favorite')->name('admin.favorite');
Route::get('/admin/myfavorite/search','AdminController@myfavorite_search')->name('admin_favorite_idea_search');
Route::get('/admin/idea/submit/form','AdminController@submit_idea_form')->name('admin_submit_idea_form');
Route::get('/admin/file/submit/form','AdminController@submit_file_form')->name('admin_submit_file_form');

Route::get('/admin/permission','PermissionController@permission')->name('permission');
Route::post('/thesis/dic/download','AdminController@downloadDocFile')->name('downloadDocFile');
Route::post('/thesis/zip/download','AdminController@downloadZipFile')->name('downloadZipFile');

// end admin/teacher controller
Route::group(['middleware'=>['auth']], function (){
   Route::post('favorite/{idea}/add','FavoriteController@add')->name('idea.favorite');
   Route::get('favorite/index','FavoriteController@index')->name('favorite');
   Route::post('comment/{idea}','CommentController@store')->name('comment.store');
});

// Route::get('/register/teacher','RegisterTeacherController@showRegisterForm')->name('registerTeacher');
// Route::post('/register/teacher/store','RegisterTeacherController@store')->name('register.submit');


