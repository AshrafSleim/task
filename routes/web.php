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

Route::get('/', 'IndexController@index')->name('index');
Route::get('/test', function () {
//    $user=auth()->user();
//    dd($user->can('comment'));
//    $user->assignRole(1);

//    $permission = \Spatie\Permission\Models\Permission::create(['name' => 'edit']);

//    $role=\Spatie\Permission\Models\Role::find(2);
//$role->givePermissionTo('edit','create');

});

Route::get('/register', 'UserController@showClientRegisterForm')->name('siteRegister');
Route::post('/register', 'UserController@createClient')->name('sitePostRegister');
Route::get('active/account/{token}', 'UserController@active');

Route::get('/clientLogin', 'UserController@showClintLoginForm')->name('siteLogin');
Route::post('/clientLogin', 'UserController@loginClint')->name('sitePostLogin');
Route::post('/clientLogout', 'UserController@logout')->name('siteLogout');

Route::get('/getResetPassword', 'UserController@getResetPassword')->name('getResetPassword');
Route::post('/postResetPassword', 'UserController@sendPasswordMail')->name('postResetPassword');
Route::get('reset/password/{token}', 'UserController@reset_password');
Route::post('reset/password/{token}', 'UserController@reset_password_final');

//Auth::routes();

Route::get('/addnew', 'HomeController@addnew')->name('addnew');
Route::post('/addnew', 'HomeController@postnew')->name('postnew');
Route::get('/update/{id}', 'HomeController@update')->name('update');
Route::post('/postupdate/{id}', 'HomeController@postUpdate')->name('postUpdate');
Route::post('/addComment/{id}', 'HomeController@addComment')->name('addComment');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/PageNotFound',function (){
    return view('errors.!404');
})->name('PageNotFound');
