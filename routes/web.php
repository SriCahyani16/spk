<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\HomeController;
use App\Models\Penilaian;
use App\Http\Controllers\PanitiaController;

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
}) ;


Route::get('/hasil', [PenilaianController::class, 'hasilOperasi']);
Route::get('/penilaian', [PenilaianController::class,'index']);
Route::get('/dashboard-spk', [PenilaianController::class, 'dashboardSpk']);


// Route::post('/penilaian', [PenilaianController::class, 'index']);
//Route::get('/index-alternative', [PenilaianController::class, 'indexAlternative']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/index-criteria', [PenilaianController::class, 'indexCriteria']);
    Route::get('/add-criteria', [PenilaianController::class, 'showAddCriteria']);
    Route::post('/add-criteria', [PenilaianController::class, 'addCriteria']);
    Route::get('/edit-criteria/{id}', [PenilaianController::class, 'editCriteria']);
    Route::get('/hapus-criteria/{id}', [PenilaianController::class, 'destroyCriteria']);
    Route::post('/update-criteria', [PenilaianController::class, 'updateCriteria']);

    Route::get('/index-user', [PenilaianController::class, 'indexUser']);
    Route::get('/add-user', [PenilaianController::class, 'showAddUser']);
    Route::post('/add-user', [PenilaianController::class, 'addUser']);
    Route::get('/edit-user/{id}', [PenilaianController::class, 'editUser']);
    Route::get('/hapus-user/{id}', [PenilaianController::class, 'destroyUser']);
    Route::post('/update-user', [PenilaianController::class, 'updateUser']);

    Route::post('/dashboard-spk',[PenilaianController::class,'jumlahAlternative']);
    Route::post('/dashboard-spk',[PenilaianController::class,'jumlahCriteria']);

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/dashboard', function () {
    return view('sb-admin/app');
    });

});


Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/index-alternative', [PenilaianController::class, 'indexAlternative']);
    Route::get('/add-alternative', [PenilaianController::class, 'showAddAlternative']);
    Route::post('/add-alternative', [PenilaianController::class, 'addAlternative']);
    Route::get('/edit-alternative/{id}', [PenilaianController::class, 'editAlternative']);
    Route::get('/hapus-alternative/{id}', [PenilaianController::class, 'destroyAlternative']);
    Route::post('/update-alternative', [PenilaianController::class, 'updateAlternative']);
    Route::get('/user/home', [HomeController::class, 'userHome'])->name('user.home');


    //  Route::resource('/penilaian', PenilaianController::class);
});
Route::get('/check_auth', function ()  {
    return Auth::user();
});




