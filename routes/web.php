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
})->middleware('verified');
Route::get('/home', function () {
})->middleware('verified');

Auth::routes(['verify' => true]);
Route::prefix('user')->group(function () {
    Route::get('/', 'UserController@index')->name('user.index');
    Route::get('edit', 'UserController@edit')->name('user.edit');
    Route::get('changePassword', 'UserController@showChangePasswordForm');

    Route::post('edit', 'UserController@update')->name('user.update');
    Route::post('changePassword', 'UserController@changePassword')->name('changePassword');
    /*
     * Wallet
     */

    Route::get('/wallet', 'WalletController@index')->name('user.wallet.index');
    Route::get('/wallet/create', 'WalletController@create')->name('user.wallet.create');
    Route::get('/wallet/edit', 'WalletController@edit')->name('user.wallet.edit');
    Route::get('/wallet/delete', 'WalletController@delete')->name('user.wallet.delete');
    Route::get('/wallet/transport', 'WalletController@transport')->name('user.wallet.transport');

    Route::post('/wallet/store', 'WalletController@store')->name('user.wallet.store');
    Route::post('/wallet/update', 'WalletController@update')->name('user.wallet.update');
    Route::post('/wallet/destroy', 'WalletController@destroy')->name('user.wallet.destroy');
    Route::post('/wallet/transporter', 'WalletController@transporter')->name('user.wallet.transporter');

    /*
     * collect
     */
    Route::get('/collect', 'CollectController@index')->name('user.collect.index');
    Route::get('/collect/create', 'CollectController@create')->name('user.collect.create');
    Route::get('/collect/edit', 'CollectController@edit')->name('user.collect.edit');
    Route::get('/collect/delete', 'CollectController@delete')->name('user.collect.delete');
    Route::get('/collect/transport', 'CollectController@transport')->name('user.collect.transport');

    Route::post('/collect/store', 'CollectController@store')->name('user.collect.store');
    Route::post('/collect/update', 'CollectController@update')->name('user.collect.update');
    Route::post('/collect/destroy', 'CollectController@destroy')->name('user.collect.destroy');
    Route::post('/collect/transporter', 'CollectController@transporter')->name('user.collect.transporter');

    /*
     * Pay
     */
    Route::get('/pay', 'PayController@index')->name('user.pay.index');
    Route::get('/pay/create', 'PayController@create')->name('user.pay.create');
    Route::get('/pay/edit', 'PayController@edit')->name('user.pay.edit');
    Route::get('/pay/delete', 'PayController@delete')->name('user.pay.delete');
    Route::get('/pay/transport', 'PayController@transport')->name('user.pay.transport');

    Route::post('/pay/store', 'PayController@store')->name('user.pay.store');
    Route::post('/pay/update', 'PayController@update')->name('user.pay.update');
    Route::post('/pay/destroy', 'PayController@destroy')->name('user.pay.destroy');
    Route::post('/pay/transporter', 'PayController@transporter')->name('user.pay.transporter');

    /*
     * Bill
     */
    Route::get('/bill', 'BillController@index')->name('user.bill.index');
    Route::get('export', 'BillController@export')->name('user.bill.export');
});
