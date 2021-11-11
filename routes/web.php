<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserAuthController;
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

//login page//
Route::get('login', [UserAuthController::class, 'login']);
Route::get('register', [UserAuthController::class, 'register']);
Route::post('create', [UserAuthController::class, 'create'])->name('auth.create');
Route::post('check', [UserAuthController::class, 'check'])->name('auth.check');
Route::get('profile', [UserAuthController::class, 'profile'])->name('auth.profile');
Route::get('logout', [UserAuthController::class, 'logout']);



Route::get('/company/all', [CompanyController::class, 'AllCompany'])->name('all.company');
Route::get('/add/company', [CompanyController::class, 'AddCompany'])->name('add.company');
Route::post('/store/company', [CompanyController::class, 'StoreCompany'])->name('store.company');
Route::get('/company/edit/{id}', [BrandController ::class, 'Edit']);
Route::get('company/delete/{id}', [BrandController ::class, 'Delete']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    $users= DB::table('users')->get();
    return view('dashboard', compact('users'));
})->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
