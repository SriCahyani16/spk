<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\HomeController;
use App\Models\Penilaian;

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


Route::resource('/penilaian', PenilaianController::class);
Route::get('/add-alternative', [PenilaianController::class, 'showAddAlternative']);
Route::post('/add-alternative', [PenilaianController::class, 'addAlternative']);
Route::get('/add-criteria', [PenilaianController::class, 'showAddCriteria']);
Route::post('/add-criteria', [PenilaianController::class, 'addCriteria']);
Route::get('/hasil', [PenilaianController::class, 'hasilOperasi']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/dashboard', function () {
        return view('sb-admin/app');
});

Route::middleware(['auth', 'user-access:user'])->group(function () {

    //  Route::resource('/penilaian', PenilaianController::class);
});



});





