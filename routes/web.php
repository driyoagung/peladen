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
use App\Http\Controllers\superadmin\UserSuperAdminController;
use App\Http\Controllers\Verifikator\DashboardVerifController;
use App\Http\Controllers\Verifikator\LayananKMVerifController;
use App\Http\Controllers\Verifikator\LayananSPLPVerifController;
use App\Http\Controllers\Verifikator\LayananTTEVerifController;
use App\Http\Controllers\Verifikator\LayananVPNVerifController;
use App\Http\Controllers\Verifikator\LayananZoomVerifController;
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
    // Routes Download PDF Layanan Zoom
    Route::get('/downloadPDF', [LayananSPLPController::class,'downloadPDF'])->name('downloadPDF');
    // Route::get('/service',[ServiceController::class,'index'])->name('service');
    // Routes to KategoriController
    Route::get('/service', [ServiceController::class, 'index'])->name('service');
    Route::get('/service/create', [ServiceController::class, 'create'])->name('service.create');
    Route::post('/service', [ServiceController::class, 'store'])->name('service.store');
    Route::get('/service/{id}/edit', [ServiceController::class, 'edit'])->name('service.edit');
    Route::put('/service/{id}', [ServiceController::class, 'update'])->name('service.update');
    Route::delete('/service/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');


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
Route::middleware(['auth', 'role:superadmin'])->prefix('superadmin')->name('superadmin.')->group(function () {
  Route::resource('users', UserSuperAdminController::class);
});
// Rute untuk Verifikator
Route::middleware(['auth', 'role:verifikator'])->prefix('verifikator')->group(function () {
  // Routes for Layanan Zoom Verif
  Route::get('/layananZoom', [LayananZoomVerifController::class, 'index'])->name('verifikator.layananZoom');
  Route::get('/layananZoom/create', [LayananZoomVerifController::class, 'create'])->name('verifikator.layananZoom.create');
  Route::get('/dashboard', [DashboardVerifController::class, 'index'])->name('verifikator.dashboard');
  Route::get('/layananZoom/{id}/edit', [LayananZoomVerifController::class, 'edit'])->name('verifikator.layananZoom.edit');
  Route::put('/layananZoom/{id}', [LayananZoomVerifController::class, 'update'])->name('verifikator.layananZoom.update');
  Route::put('/layananZoom/{id}/status', [LayananZoomVerifController::class, 'updateStatus'])->name('verifikator.layananZoom.updateStatus');
  Route::delete('/layananZoom/{id}', [LayananZoomVerifController::class, 'destroy'])->name('verifikator.layananZoom.destroy');



  



  // Routes for Layanan VPN Verif
  Route::get('/layananVPN', [LayananVPNVerifController::class, 'index'])->name('verifikator.layananVPN');
  Route::get('/layananVPN/{id}/edit', [LayananVPNVerifController::class, 'edit'])->name('verifikator.layananVPN.edit');
  Route::put('/layananVPN/{id}', [LayananVPNVerifController::class, 'update'])->name('verifikator.layananVPN.update');
  Route::delete('/layananVPN/{id}', [LayananVPNVerifController::class, 'destroy'])->name('verifikator.layananVPN.destroy');
  Route::put('/layananVPN/{id}/status', [LayananVPNVerifController::class, 'updateStatus'])->name('verifikator.layananVPN.updateStatus');

  // Routes for Layanan SPLP Verif
  Route::get('/layananSPLP', [LayananSPLPVerifController::class, 'index'])->name('verifikator.layananSPLP');
  Route::get('/layananSPLP/{id}/edit', [LayananSPLPVerifController::class, 'edit'])->name('verifikator.layananSPLP.edit');
  Route::put('/layananSPLP/{id}', [LayananSPLPVerifController::class, 'update'])->name('verifikator.layananSPLP.update');
  Route::put('/layananSPLP/{id}/status', [LayananSPLPVerifController::class, 'updateStatus'])->name('verifikator.layananSPLP.updateStatus');
  Route::delete('/layananSPLP/{id}', [LayananSPLPVerifController::class, 'destroy'])->name('verifikator.layananSPLP.destroy');
  

  // Routes for Layanan TTE Verif
  Route::get('/layananTTE', [LayananTTEVerifController::class, 'index'])->name('verifikator.layananTTE');
  Route::get('/layananTTE/{id}/edit', [LayananTTEVerifController::class, 'edit'])->name('verifikator.layananTTE.edit');
  Route::put('/layananTTE/{id}', [LayananTTEVerifController::class, 'update'])->name('verifikator.layananTTE.update');
  Route::put('/layananTTE/{id}/status', [LayananTTEVerifController::class, 'updateStatus'])->name('verifikator.layananTTE.updateStatus');
  Route::delete('/layananTTE/{id}', [LayananTTEVerifController::class, 'destroy'])->name('verifikator.layananTTE.destroy');

  // Routes for Layanan KM Verif
  Route::get('/layananKM', [LayananKMVerifController::class, 'index'])->name('verifikator.layananKM');
  Route::get('/layananKM/{id}/edit', [LayananKMVerifController::class, 'edit'])->name('verifikator.layananKM.edit');
  Route::put('/layananKM/{id}', [LayananKMVerifController::class, 'update'])->name('verifikator.layananKM.update');
  Route::delete('/layananKM/{id}', [LayananKMVerifController::class, 'destroy'])->name('verifikator.layananKM.destroy');
  Route::put('/layananKM/{id}/status', [LayananKMVerifController::class, 'updateStatus'])->name('verifikator.layananKM.updateStatus');
});




require __DIR__ . '/auth.php';
