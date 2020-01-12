<?php
Route::get('/login', 'admin@showAdminLoginForm')->name('AdminLogin');
Route::post('/login', 'admin@loginAdmin')->name('PostAdminLogin');

Route::group(['middleware' => 'Admin:admin'], function () {
    Route::get('/register', 'admin@showAdminRegisterForm')->name('AdminRegistration');
    Route::post('/register', 'admin@createAdmin')->name('PostAdminRegistration');

    Route::get('/', function () {
        session()->forget('menu');
        session()->put('menu', 'home');
        return view('admin.home');
    })->name('adminHome');

    Route::get('/logout', 'admin@logout')->name('logoutAdmin');
    Route::group(['namespace' => 'Admin'], function () {
//user route
        Route::get('user', 'User@index')->name('adminUser.index');
        Route::post('/deleteUser/{id}', 'User@delete')->name('adminUser.delete');

        Route::get('/allPosts', 'PostController@index')->name('adminPosts');

        Route::get('/updatepost/{id}', 'PostController@update')->name('adminUpdate');
        Route::post('/postupdate/{id}', 'PostController@postUpdate')->name('adminPostUpdate');
        Route::post('/deletePost/{id}', 'PostController@delete')->name('deletePost');

    });
});
