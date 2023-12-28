<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\ServiceController;
use App\Livewire\Dashboard\DashboardComponent;
use App\Livewire\Main\ComputersComponent;
use App\Livewire\Main\ItemsComponent;
use App\Livewire\Main\ServiceComponent;
use App\Livewire\Main\ServiceMenu\ServiceDetailComponent;

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
Route::post('/login', [AuthController::class, 'loginStart'])->name('loginStart');
Route::get('/signup', [AuthController::class, 'signup'])->name('startSignup');
Route::post('/signup/store', [AuthController::class, 'storeUser'])->name('storeUser');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'success_login'])->name('dashboard');
    // Route::get('/profile', ProfileComponent::class)->name('profile');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Category routes
    Route::get('/category-index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category-show/{id}', [CategoryController::class, 'category_show'])->name('category.show');
    Route::post('/category-store', [CategoryController::class, 'category_store'])->name('category.store');
    Route::post('/category-update/{id}', [CategoryController::class, 'category_update'])->name('category.update');

    // Items routes
    Route::prefix('items')->group(function (){
        Route::get('/', [ItemsController::class, 'main_page'])->name('item');
        Route::get('/item-index', [ItemsController::class, 'index'])->name('item.index');
        Route::get('/item-show/{id}', [ItemsController::class, 'item_show'])->name('item.show');
        Route::post('/item-store', [ItemsController::class, 'item_store'])->name('item.store');
        Route::post('/item-update/{id}', [ItemsController::class, 'item_update'])->name('item.update');
    });

    // Service routes
    Route::prefix('services')->group(function (){
        Route::get('/', [ServiceController::class, 'main_page'])->name('service');
        Route::get('/service-index', [ServiceController::class, 'index'])->name('service.index');
        Route::get('/service-show/{id}', [ServiceController::class, 'service_show'])->name('service.show');
        Route::post('/service-store', [ServiceController::class, 'service_store'])->name('service.store');
        Route::post('/service-update/{id}', [ServiceController::class, 'service_update'])->name('service.update');
        Route::get('/service-detail/{id}', [ServiceController::class, 'service_detail'])->name('service.detail');
        Route::post('/service-done', [ServiceController::class, 'service_done'])->name('service.done');
        Route::get('/service-get-items', [ServiceController::class, 'available_items'])->name('service.get_available_items');
        Route::get('/service-update/{id}', [ServiceController::class, 'open_edit_service'])->name('service.open_edit_service');
    });
    

    // Route::get('/service/{id}', function ($id) { 
    //     return view('layouts.template2', compact('id') ); 
    // })->name('service.detail');

    
    Route::get('/computers', ComputersComponent::class)->name('computers');
});