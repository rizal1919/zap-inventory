<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Livewire\Dashboard\DashboardComponent;

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

Route::get('/', [AuthController::class, 'guest'])->name('guestLogin');
Route::get('/signup', [AuthController::class, 'signup'])->name('startSignup');
Route::get('/dashboard', DashboardComponent::class)->name('dashboard');
// Route::get('/profile', ProfileComponent::class)->name('profile');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/login', [AuthController::class, 'loginStart'])->name('loginStart');
Route::post('/signup/store', [AuthController::class, 'storeUser'])->name('storeUser');
