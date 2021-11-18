<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Models\User;
use App\Http\Controllers\BrandController;

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


Route::get('/company/all', [CompanyController::class, 'AllCompany'])->name('all.company');
Route::get('/add/company', [CompanyController::class, 'AddCompany'])->name('add.company');
Route::post('/store/company', [CompanyController::class, 'StoreCompany'])->name('store.company');
Route::get('/company/edit/{id}', [CompanyController ::class, 'Edit']);
Route::get('company/delete/{id}', [CompanyController ::class, 'Delete']);

//brand//
Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('Brand.all');
Route::post('/brand/add', [BrandController::class, 'StoreBrand'])->name('Brand.store');
Route::get('/brand/edit/{id}', [BrandController ::class, 'Edits']);
Route::post('/brand/update/{id}', [BrandController ::class, 'Updated']);
Route::get('brand/delete/{id}', [BrandController ::class, 'Deleted']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
