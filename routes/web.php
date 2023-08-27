<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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

Route::get('/', [AuthenticatedSessionController::class, 'create'])
->name('login');

// Route::get('/', function () {
//     return view('wellcome');
// });

Route::get('/dashboard',[HomeController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->prefix('users')->group(function(){
    Route::get('/',[UserController::class,'index'])->name('users');
    Route::get('/create',[UserController::class,'create'])->name('users.create');
    Route::post('/store',[UserController::class,'store'])->name('users.store');
    Route::get('/edit/{user}',[UserController::class,'edit'])->name('users.edit');
    Route::post('/update/{user}',[UserController::class,'update'])->name('users.update');
    Route::get('/delete/{user}',[UserController::class,'delete'])->name('users.delete');
});


Route::middleware('auth')->prefix('roles')->group(function(){
    Route::get('/',[RoleController::class,'index'])->name('roles');
    Route::get('/create',[RoleController::class,'create'])->name('roles.create');
    Route::post('/store',[RoleController::class,'store'])->name('roles.store');
    Route::get('/edit/{role}',[RoleController::class,'edit'])->name('roles.edit');
    Route::post('/update/{role}',[RoleController::class,'update'])->name('roles.update');
    Route::get('/delete/{role}',[RoleController::class,'delete'])->name('roles.delete');
});

// Add the following route for logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('logout');

require __DIR__.'/auth.php';
