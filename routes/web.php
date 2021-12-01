<?php

use App\Http\Controllers\ArticleEditController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', [ArticleEditController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/new', [ArticleEditController::class, 'new'])->middleware(['auth'])->name('new');
route::post('/create', [ArticleEditController::class, 'create'])->middleware(['auth'])->name('create');
Route::get('/detail/{id}', [ArticleEditController::class, 'detail'])->name('detail');
Route::get('/edit/{id}', [ArticleEditController::class, 'edit'])->name('edit');
route::patch('/update', [ArticleEditController::class, 'update'])->middleware(['auth'])->name('update');
Route::delete('/remove/{id}', [ArticleEditController::class, 'remove'])->name('remove');


require __DIR__.'/auth.php';
