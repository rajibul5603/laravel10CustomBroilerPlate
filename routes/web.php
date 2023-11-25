<?php

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::view('/', 'welcome');


Auth::routes();


// Old existing route group for administrators - we don't touch it
Route::group([
    'prefix' => 'admin', 
    'as' => 'admin.', 
    'namespace' => 'Admin', 
    'middleware' => ['auth']
], function () {
    Route::get('/', 'HomeController@index')->name('home');
    
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');
    
    // ... other admin routes
});

// Our NEW group - for front-end users
Route::group([
    'prefix' => 'user', 
    'as' => 'user.', 
    'namespace' => 'User', 
    'middleware' => ['auth']
], function () {
    Route::get('/', 'HomeController@index')->name('home');
});	


 