<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LayananKontenMultimediaController;
use App\Http\Controllers\Admin\LayananSPLPController;
use App\Http\Controllers\Admin\LayananTTEController;
use App\Http\Controllers\Admin\LayananVPNController;
use App\Http\Controllers\Admin\LayananZoomController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\OPD\LayananKMOPDController;
use App\Http\Controllers\OPD\LayananSPLPOPDController;
use App\Http\Controllers\OPD\LayananTTEOPDController;
use App\Http\Controllers\OPD\LayananVPNOPDController;
use App\Http\Controllers\OPD\LayananZoomOPDController;
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

Route::get('/', [HomepageController::class, 'index'])->name('home');
Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');

// Dashboard routes
Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard', 'as' => 'admin.'], function () {
    // Single action controllers
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Links that return view, to get component from there
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
    Route::get('/layananZoom/create', [LayananZoomController::class, 'create'])->name('layananZoom.create');
    Route::post('/layananZoom', [LayananZoomController::class, 'store'])->name('layananZoom.store');
    Route::put('/layananZoom/{id}', [LayananZoomController::class, 'update'])->name('layananZoom.update');
    Route::delete('/layananZoom/{id}', [LayananZoomController::class, 'destroy'])->name('layananZoom.destroy');

    // Routes to Services
    Route::get('/service',[ServiceController::class,'index'])->name('service');

    // Routes to LayananVPNController
    Route::get('/layananVPN', [LayananVPNController::class, 'index'])->name('layananVPN');
    Route::get('/layananVPN/create', [LayananVPNController::class, 'create'])->name('layananVPN.create');
    Route::get('/layananVPN/{id}/edit', [LayananVPNController::class, 'edit'])->name('layananVPN.edit');
    Route::put('/layananVPN/{id}', [LayananVPNController::class, 'update'])->name('layananVPN.update');
    Route::delete('/layananVPN/{id}', [LayananVPNController::class, 'destroy'])->name('layananVPN.destroy');

    // Routes to LayananSPLPController
    Route::get('/layananSPLP', [LayananSPLPController::class, 'index'])->name('layananSPLP');
    Route::get('/layananSPLP/create', [LayananSPLPController::class, 'create'])->name('layananSPLP.create');
    Route::get('/layananSPLP/{id}/edit', [LayananSPLPController::class, 'edit'])->name('layananSPLP.edit');
    Route::put('/layananSPLP/{id}', [LayananSPLPController::class, 'update'])->name('layananSPLP.update');
    Route::delete('/layananSPLP/{id}', [LayananSPLPController::class, 'destroy'])->name('layananSPLP.destroy');

    // Routes to LayananTTEController
    Route::get('/layananTTE', [LayananTTEController::class, 'index'])->name('layananTTE');
    Route::get('/layananTTE/{id}/edit', [LayananTTEController::class, 'edit'])->name('layananTTE.edit');
    Route::put('/layananTTE/{id}', [LayananTTEController::class, 'update'])->name('layananTTE.update');
    Route::delete('/layananTTE/{id}', [LayananTTEController::class, 'destroy'])->name('layananTTE.destroy');




    // Routes to LayananKontenMultimediaController
    Route::get('/layananKM', [LayananKontenMultimediaController::class, 'index'])->name('layananKM');
    Route::get('/layananKM/create', [LayananKontenMultimediaController::class, 'create'])->name('layananKM.create');
    Route::get('/layananKM/{id}/edit', [LayananKontenMultimediaController::class, 'edit'])->name('layananKM.edit');
    Route::put('/layananKM/{id}', [LayananKontenMultimediaController::class, 'update'])->name('layananKM.update');
    Route::delete('/layananKM/{id}', [LayananKontenMultimediaController::class, 'destroy'])->name('layananKM.destroy');

    // Pages
    Route::group(['prefix' => 'pages', 'as' => 'page.'], function () {
        Route::view('/404-page', 'admin.pages.404')->name('404');
        Route::view('/blank-page', 'admin.pages.blank')->name('blank');
        Route::view('/create-account-page', 'admin.pages.create-account')->name('create-account');
        Route::view('/forgot-password-page', 'admin.pages.forgot-password')->name('forgot-password');
        Route::view('/login-page', 'admin.pages.login')->name('login');
    });
});

// Rute untuk OPD, di luar grup admin
Route::group(['middleware' => ['auth', 'role:opd'], 'prefix' => 'opd', 'as' => 'opd.'], function () {
  Route::get('/layanan-zoom/create', [LayananZoomOPDController::class, 'create'])->name('layananZoom.create');
  Route::post('/layanan-zoom', [LayananZoomOPDController::class, 'store'])->name('layananZoom.store');
  Route::post('/layanan-vpn', [LayananVPNOPDController::class, 'store'])->name('layananVPN.store');
  Route::get('/layanan-vpn/create', [LayananVPNOPDController::class, 'create'])->name('layananVPN.create');
  Route::post('/layanan-opd', [LayananSPLPOPDController::class, 'store'])->name('layananSPLP.store');
  Route::get('/layanan-opd/create', [LayananSPLPOPDController::class, 'create'])->name('layananSPLP.create');
  Route::post('/layanan-km', [LayananKMOPDController::class, 'store'])->name('layananKM.store');
  Route::get('/layanan-km/create', [LayananKMOPDController::class, 'create'])->name('layananKM.create');
  Route::post('/layanan-tte', [LayananTTEOPDController::class, 'store'])->name('layananTTE.store');
  Route::get('/layanan-tte/create', [LayananTTEOPDController::class, 'create'])->name('layananTTE.create');
  // Tambahkan rute lainnya sesuai kebutuhan
});

require __DIR__ . '/auth.php';
