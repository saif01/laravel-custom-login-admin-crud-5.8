<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('/blank', function () {
    return view('admin.blank');
});

Route::get('/error', function () {
    //return 'You Are Gonig Worng Way';
    return view('admin.error');
});

//Start Login Route
Route::get('/admin', 'login\LoginController@ShowLoginForm')->name('admin.login.form');
Route::post('/admin-login-action', 'login\LoginController@loginAction')->name('admin.login.action');

Route::group(['middleware' => 'login'], function () {
//Start Login middleware
Route::get('/admin-logout', 'login\LoginController@logout')->name('admin.logout');
Route::post('/check', 'CommonController@CkeckValue')->name('value_available.check');
//Admin Logout
Route::group(['prefix'=>'admin'], function(){
        Route::get('/dashboard', 'AdminController@Dashboard')->name('admin.dashboard');
        Route::get('/add','AdminController@Add');
        Route::post('/insert','AdminController@Insert');
});
//Route::get('/admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');

});
//end Loging middleware
