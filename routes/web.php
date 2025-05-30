<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;


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

Route::get('test', function () {
    \Illuminate\Support\Facades\Mail::to('castrodesjohnpaul@gmail.com')->send(
        new \App\Mail\JobPosted()
    );
    return 'Done';
});


Route::view('/', 'home', [
    'greeting' => 'Hello There',
    'user' => 'John Paul',
    'school' => 'Father Saturnino Urios University',
]);
Route::view('contact', 'contact');
Route::view('welcome', 'welcome');


//Route::resource('jobs', JobController::class)->only(['index', 'show']);
//Route::resource('jobs', JobController::class)->except(['index', 'show'])->middleware('auth');


Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
Route::get('/jobs/{job}', [JobController::class, 'show']);
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job');

Route::patch('/jobs/{job}', [JobController::class, 'update']);
//    ->middleware('auth')
//    ->can('edit', 'job');
Route::delete('/jobs/{job}', [JobController::class, 'destroy']);
//    ->middleware('auth')
//    ->can('edit', 'job');
//Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

