<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LayananSPLPController;
use App\Http\Controllers\Admin\LayananVPNController;
use App\Http\Controllers\Admin\LayananZoomController;
use App\Http\Controllers\Admin\RoleController;
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

Route::view('/', 'welcome');
Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');


//dashboard routes
Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard', 'as' => 'admin.'], function () {
    //single action controllers
    Route::get('/', HomeController::class)->name('home');

    //link that return view, to get compoment from there
    Route::view('/buttons', 'admin.buttons')->name('buttons');
    Route::view('/cards', 'admin.cards')->name('cards');
    Route::view('/charts', 'admin.charts')->name('charts');
    Route::view('/forms', 'admin.forms')->name('forms');
    Route::view('/modals', 'admin.modals')->name('modals');
    Route::view('/tables', 'admin.tables')->name('tables');
    Route::view('/roles', 'admin.roles')->name('roles');
      // Routes to LayananZoomController
      Route::get('/layananZoom', [LayananZoomController::class, 'index'])->name('layananZoom');
      Route::get('/layananZoom/{id}/edit', [LayananZoomController::class, 'edit'])->name('layananZoom.edit');
      Route::put('/layananZoom/{id}', [LayananZoomController::class, 'update'])->name('layananZoom.update');
      Route::delete('/layananZoom/{id}', [LayananZoomController::class, 'destroy'])->name('layananZoom.destroy');

      //Routes to LayananVPNController
      Route::get('/layananVPN', [LayananVPNController::class, 'index'])->name('layananVPN');
      Route::get('/layananVPN/{id}/edit', [LayananVPNController::class, 'edit'])->name('layananVPN.edit');
      Route::put('/layananVPN/{id}', [LayananVPNController::class, 'update'])->name('layananVPN.update');
      Route::delete('/layananVPN/{id}', [LayananVPNController::class, 'destroy'])->name('layananVPN.destroy');

      //Routes to LayananSPLPController
      Route::get('/layananSPLP', [LayananSPLPController::class, 'index'])->name('layananSPLP');
      Route::get('/layananSPLP/{id}/edit', [LayananSPLPController::class, 'edit'])->name('layananSPLP.edit');
      Route::put('/layananSPLP/{id}', [LayananSPLPController::class, 'update'])->name('layananSPLP.update');
      Route::delete('/layananSPLP/{id}', [LayananSPLPController::class, 'destroy'])->name('layananSPLP.destroy');



    Route::group(['prefix' => 'pages', 'as' => 'page.'], function () {
        Route::view('/404-page', 'admin.pages.404')->name('404');
        Route::view('/blank-page', 'admin.pages.blank')->name('blank');
        Route::view('/create-account-page', 'admin.pages.create-account')->name('create-account');
        Route::view('/forgot-password-page', 'admin.pages.forgot-password')->name('forgot-password');
        Route::view('/login-page', 'admin.pages.login')->name('login');
    });
});

    
require __DIR__ . '/auth.php';
