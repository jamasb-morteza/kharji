<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Expends\ExpendController;
use App\Http\Controllers\Users\UserController;

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
        $router->get('/{expend_id}/edit', [ExpendController::class, 'edit'])->name('expends.edit');
        $router->get('/{expend_id}', [ExpendController::class, 'show'])->name('expends.show');

        $router->post('/', [ExpendController::class, 'store'])->name('expends.store');
        $router->put('/{expend_id}', [ExpendController::class, 'update'])->name('expends.update');
        $router->delete('/{expend_id}', [ExpendController::class, 'destroy'])->name('expends.destroy');

    });

    $router->group(['prefix' => 'users', 'namespace' => 'Users'], function ($router) {
        $router->get('/', [UserController::class, 'index'])->name('users.index');
        $router->get('/create', [UserController::class, 'create'])->name('users.create');
        $router->get('/{user_id}/edit', [UserController::class, 'edit'])->name('users.edit');
        $router->get('/{user_id}', [UserController::class, 'show'])->name('users.show');

        $router->post('/', [UserController::class, 'store'])->name('users.store');
        $router->put('/{user_id}', [UserController::class, 'update'])->name('users.update');
        $router->delete('/{user_id}', [UserController::class, 'destroy'])->name('users.destroy');

    });

});


Route::get('/oauth/google', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'oAuthGoogleLogin']);
Route::get('/oauth/google-callback', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'oAuthGoogleCallback']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
