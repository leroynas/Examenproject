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

Route::get('/contact', function () {
    $locations = App\Location::all();
    return view('contact', compact('locations'));
});

Route::prefix('admin')->group(function () {
    // Inventory Routes...
    Route::get('/', 'Admin\MainController@index')->name('dashboard');
    Route::post('/voorraad/check', 'Admin\InventoryController@show')->name('inventory.show');
    Route::get('/voorraad/{location}', 'Admin\InventoryController@index')->name('inventory.index');
    Route::get('/voorraad/{location}/toevoegen', 'Admin\InventoryController@create')->name('inventory.create');
    Route::post('/voorraad/{location}', 'Admin\InventoryController@store')->name('inventory.store');
    Route::get('/voorraad/{location}/edit/{product}', 'Admin\InventoryController@edit')->name('inventory.edit');
    Route::put('/voorraad/{location}/update/{product}', 'Admin\InventoryController@update')->name('inventory.update');
    Route::get('/voorraad/{location}/verwijderen/{product}', 'Admin\InventoryController@delete')->name('inventory.delete');

    // Location Routes...
    Route::get('/locaties', 'Admin\LocationController@index')->name('locations.index');
    Route::get('/locaties/toevoegen', 'Admin\LocationController@create')->name('locations.create');
    Route::post('/locaties', 'Admin\LocationController@store')->name('locations.store');
    Route::get('/locaties/{location}/bewerken', 'Admin\LocationController@edit')->name('locations.edit');
    Route::put('/locaties/{location}', 'Admin\LocationController@update')->name('locations.update');
    Route::get('/locaties/{location}/verwijderen', 'Admin\LocationController@delete')->name('locations.delete');

    // Product Routes...
    Route::get('/producten', 'Admin\ProductController@index')->name('products.index');
    Route::get('/producten/toevoegen', 'Admin\ProductController@create')->name('products.create');
    Route::post('/producten', 'Admin\ProductController@store')->name('products.store');
    Route::get('/producten/{product}/bewerken', 'Admin\ProductController@edit')->name('products.edit');
    Route::put('/producten/{product}', 'Admin\ProductController@update')->name('products.update');
    Route::get('/producten/{product}/verwijderen', 'Admin\ProductController@delete')->name('products.delete');

    // Manufacterer Routes...
    Route::get('/fabrikanten', 'Admin\ManufactererController@index')->name('manufacterers.index');
    Route::get('/fabrikanten/toevoegen', 'Admin\ManufactererController@create')->name('manufacterers.create');
    Route::post('/fabrikanten', 'Admin\ManufactererController@store')->name('manufacterers.store');
    Route::get('/fabrikanten/{manufacterer}/bewerken', 'Admin\ManufactererController@edit')->name('manufacterers.edit');
    Route::put('/fabrikanten/{manufacterer}', 'Admin\ManufactererController@update')->name('manufacterers.update');
    Route::get('/fabrikanten/{manufacterer}/verwijderen', 'Admin\ManufactererController@delete')->name('manufacterers.delete');

    // Authentication Routes...
    Route::get('inloggen', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('inloggen', 'Auth\LoginController@login');
    Route::post('uitloggen', 'Auth\LoginController@logout')->name('logout');

    // Password Reset Routes...
    Route::get('wachtwoord/herstellen', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('wachtwoord/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('wachtwoord/herstellen/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('wachtwoord/herstellen', 'Auth\ResetPasswordController@reset');

    // User Routes
    Route::get('/gebruikers', 'Admin\UserController@index')->name('users.index');
    Route::get('/gebruikers/register', 'Auth\RegisterController@showRegistrationForm')->name('users.register');
    Route::post('/gebruikers/register', 'Auth\RegisterController@register')->name('register');
    Route::get('/gebruikers/{user}/bewerken', 'Admin\UserController@edit')->name('users.edit');
    Route::put('/gebruikers/{user}', 'Admin\UserController@update')->name('users.update');
    Route::get('/gebruikers/{user}/verwijderen', 'Admin\UserController@delete')->name('users.delete');
});
