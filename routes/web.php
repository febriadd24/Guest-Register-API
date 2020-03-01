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
    return view('auth.login');
});
// Route::get('/home','DashboardController@Alltoday');
Route::get('/daftartamu/export', 'DaftartamuController@ExportInterction')->name('daftartamu.ExportInterction');
Route::resource('/daftartujuan','DaftartujuanController');
Route::resource('/Demografi','TamuChartController');
Route::resource('/daftartamu','DaftartamuController',['except' => ['show']]);
Route::get('/daftartamu/{NIK}', 'DaftartamuController@show')->name('daftartamu.show');

Route::get('/table/daftartamu', 'DaftartamuController@dataTable')->name('table.daftartamu');
Route::get('/table/daftartujuan', 'DaftartujuanController@dataTable')->name('table.daftartujuan');

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('Auth/login','Auth\LoginController@showLoginForm')->name('auth.login');
Route::get('Auth/Register','Auth\RegisterController@showRegistrationForm')->name('auth.register');
// Route::get('Auth/activate','Auth\ActivationController@activate')->name('auth.activate');
Route::get('/home','HomeController@Alltoday')->name('Alltoday');
// Route::get('/home','HomeController@index')->name('home');
// Route::get('Auth/activate/resend','Auth\ActivationResendController@showResendForm')->name('auth.activate.resend');
// Route::post('Auth/activate/resend', 'Auth\ActivationResendController@resend');
