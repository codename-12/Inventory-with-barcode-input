<?php

use Illuminate\Support\Facades\Route;
//app 
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
//divisi benang
use App\Http\Controllers\BenangController;
use App\Http\Controllers\PengirimanBenangController;
use App\Http\Controllers\MasterBenangController;
use App\Http\Controllers\BPBBenangController;
use App\Http\Controllers\SupplierBenangController;
use App\Http\Controllers\InvoiceBenangController;
//divisi rajut
use App\Http\Controllers\RajutController;

//divisi gudang jadi
use App\Http\Controllers\GJPenerimaankainController;
use App\Http\Controllers\GJstockprintingController;
use App\Http\Controllers\GJbsprintingController;
use App\Http\Controllers\GJstockpolosController;
use App\Http\Controllers\GJbspolosController;
use App\Http\Controllers\GJSTOCKController;
use App\Http\Controllers\PengirimanKainController;

//divisi DF
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KOPController;
use App\Http\Controllers\DFProgresskainController;
use App\Http\Controllers\DFregkain_polosController;
use App\Http\Controllers\DFregkain_printingController;



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

Route::get('/register', function () {
    return view('auth/register');
});

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();
Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    //divisi benang
    Route::resource('benang', BenangController::class);
    Route::resource('obenang', PengirimanBenangController::class);
    Route::resource('masterbenang', MasterBenangController::class);
    Route::resource('BPBbenang', BPBBenangController::class);
    Route::resource('supbenang', SupplierBenangController::class);
    Route::resource('invoicebenang', InvoiceBenangController::class);

    //rajut kniting
    Route::resource('rajut', RajutController::class);

    //gudang jadi
    Route::resource('GJstock', GJSTOCKController::class);
    Route::resource('GJpenerimaankain', GJPenerimaankainController::class);
    Route::resource('GJstockpolos', GJstockpolosController::class);
    Route::resource('GJbspolos', GJbspolosController::class);
    Route::resource('GJpengirimankain', PengirimanKainController::class);
    Route::resource('GJstockprinting', GJstockprintingController::class);
    Route::resource('GJbsprinting', GJbsprintingController::class);
    
    //DIVISI DF
    Route::resource('KOP', KOPController::class);
    Route::resource('customerkain', CustomerController::class);
    Route::resource('regkain_polos', DFregkain_polosController::class);
    Route::resource('regkain_printing', DFregkain_printingController::class);
    Route::resource('flow_cotton', DFProgresskainController::class);
});