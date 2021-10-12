<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Expends\ExpendController;

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

Route::group(['middleware' => 'auth'], function ($router) {
    $router->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    $router->group(['prefix' => 'expends', 'namespace' => 'Expends'], function ($router) {
        $router->get('/', [ExpendController::class, 'index'])->name('expends.index');
        $router->get('/create', [ExpendController::class, 'create'])->name('expends.create');
        $router->get('/{expend_id}/edit', [ExpendController::class, 'index'])->name('expends.edit');
        $router->get('/{expend_id}', [ExpendController::class, 'index'])->name('expends.show');

    });

});


Route::get('/oauth/google',[\App\Http\Controllers\Auth\AuthenticatedSessionController::class,'oAuthGoogleLogin']);
Route::get('/oauth/google-callback',[\App\Http\Controllers\Auth\AuthenticatedSessionController::class,'oAuthGoogleCallback']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
