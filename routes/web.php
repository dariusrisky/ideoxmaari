<?php

use  App\Http\Controllers\IklanController;
use App\Http\Controllers\MainMenuController;
use App\Http\Controllers\ProfileController;
use App\Models\_menu_card_;
use App\Models\iklan;

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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    $data['data']= iklan::all();
    return view('dashboard', $data);
})->middleware(['auth', 'verified'])->name('dashboard');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    
    Route::get('addslider',[IklanController::class,'addslider'])->name('addslider');
    Route::get('slider',[IklanController::class,'slider'])->name('slider');
    Route::post('slider',[IklanController::class,'image_action'])->name('image.action');
    Route::delete('silder/{d}',[IklanController::class,'delete_action_image'])->name('image.delete.action');
    Route::get('edit/{id}',[IklanController::class,'edit'])->name('image.edit');
    Route::put('edit/{product_img}',[IklanController::class,'editNew'])->name('image.edit.action');

    Route::get('menu',[MainMenuController::class,'index'])->name('menu');
    Route::get('header/{id}',[MainMenuController::class,'Header'])->name('header');
    Route::put('header/{id}',[MainMenuController::class,'HeaderMaster'])->name('headermaster');

    Route::get('addmenu',[MainMenuController::class,'addmenu'])->name('addmenu');
    Route::post('menu.add.action',[MainMenuController::class,'menuaddaction'])->name('menu.add.action');
    Route::delete('menu/{d}',[MainMenuController::class,'menudelete'])->name('main.delete.action');
    Route::get('editmenu/{id}',[MainMenuController::class,'editmenu'])->name('menu.edit');
    Route::put('editmenu/{product_img}',[MainMenuController::class,'editmenuaction'])->name('menu.edit.action');

    
    
});

Route::get('home/{id}',[IklanController::class,'index'])
    ->name('home.index');




require __DIR__.'/auth.php';
