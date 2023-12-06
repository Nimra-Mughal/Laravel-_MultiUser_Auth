<?php

use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::view('/shop','shop');
Route::view('/about','about');
Route::view('/services','service');
Route::view('/blog','blog');
Route::view('/contact','contact');


Route::get('/home',[Homecontroller::class,'index'])->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('admin')->group(function () {
    Route::get('/addproduct',[Homecontroller::class, 'dbaddproduct']);
    Route::get('/viewproduct',[Homecontroller::class, 'dbviewproduct']);
    Route::get('/addbrand',[Homecontroller::class, 'dbaddbrand']);
    Route::post('/addbranddata',[Homecontroller::class,'addbranddata']);
    Route::post('/addproductdata',[Homecontroller::class,'addproductdata']);

});

require __DIR__.'/auth.php';
