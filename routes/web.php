<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Note;
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
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $categories = Note::select('category')->where('owner',Auth::user()->name)->distinct()->get();
        $notes = Note::where('owner',Auth::user()->name)->get();
        return view('dashboard',compact('notes','categories'));
    })->name('dashboard');
    Route::resource('/note',App\Http\Controllers\NoteController::class);
    Route::get('/note/collection/create',[\App\Http\Controllers\NoteController::class,'collectionCreate'])->name('note.collection.create');
    Route::put('/note/collection/move/{noteMove}',[\App\Http\Controllers\NoteController::class,'collectionMove'])->name('note.collection.move');
});
