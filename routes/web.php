<?php

use App\Http\Controllers\ListeController;
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

Route::get('/', [ListeController::class, 'index'])->name('index');


Route::post('/formulaire', [ListeController::class, 'formulaire'])->name('formulaire');

//delete
Route::post('/supprimer}', [ListeController::class, 'supprimer'])->name('supprimer');
