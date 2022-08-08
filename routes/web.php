<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/konsumen', function () {
    return view('konsumen.home');
});

Route::get('/', 'ProdlistController@homeProduct');
Route::get('/konsumen', 'KonsumenController@index')->name('konsumen');
Route::get('/shipping', 'KonsumenController@shipping')->name('shipping');
Route::get('/struk', 'StrukController@adminStruk')->name('struk');
Route::get('/myorder', 'KonsumenController@myorder')->name('myorder');
Route::post('/cancelOrder', 'OrderController@cancelOrder');
Route::post('/edit/update/', 'AlamatController@update');
Route::get('/bukti', 'BuktiBayarController@showbukti')->name('bukti');
Route::resource('buktibayar','BuktiBayarController');

Route::post('/edit/saveStatus/', 'OrderController@updateStatus')->name('updateStatus');


Auth::routes();
Route::resource('produk','ProdlistController');
Route::resource('konsumen','KonsumenController');


Route::post('/cart', 'OrderController@cart');
Route::resource('alamat','AlamatController');
Route::resource('struk','StrukController');
Route::group(['middleware' => ['checkRole:admin']], function() {
    Route::post('/delete', 'RoleController@hapus')->name('delete');
    Route::resource('roles','RoleController');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('users','UserController');
    Route::resource('products','ProductController');
    Route::resource('orders','OrderController');
    Route::resource('provinsi','ProvinsiController');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});


