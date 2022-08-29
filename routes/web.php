<?php

use App\Http\Controllers\CategoryController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /**
     * 1 Controller có cơ bản 7 phương thức như bên dưới
     * Có nhiều cách để định nghĩa 1 route, 1 nhóm routes
     * Trong trường hợp bên dưới t đang dùng route groups với controller
     * Tham khảo: https://laravel.com/docs/9.x/routing
     */

    // Route::controller(CategoryController::class)->group(function () {
    //     Route::get('/categories', 'index')->name('categories.index');
    //     Route::get('/categories/create', 'create')->name('categories.create');
    //     Route::post('/categories', 'store')->name('categories.store');
    //     Route::get('/categories/{category}', 'show')->name('categories.show');
    //     Route::get('/categories/{category}/edit', 'edit')->name('categories.edit');
    //     Route::put('/categories/{category}', 'update')->name('categories.update');
    //     Route::delete('/categories/{category}', 'destroy')->name('categories.destroy');
    // });

    /**
     * Thay vì dùng 7 dòng routes ở trên
     * thì có thể thay thế bằng cách dùng route resources
     */
    Route::resource('categories', CategoryController::class);
});
