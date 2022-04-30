<?php

use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
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

/*
Route::get('/posts/{id}', function ($id) {

    //dd($id);  stops the execution of the code and shows the value of the variable
    //ddd($id); 

    return response('Post: ' . $id);
})->where('id', '[0-9]+'); //adding constraints to id

Route::get ('/search',function(Request $request){
    $name = $request->name;
    $city = $request->city;
    return response('Search: ' . $name . ' ' . $city);
});
*/
 
Route::get('/',[JobController::class,'index']);

Route::get('/job/create', [JobController::class,'create'])->middleware('auth');

Route::post('/jobs', [JobController::class,'store'])->middleware('auth');

//show edit form
Route::get('/jobs/{job}/edit', [JobController::class,'edit'])->middleware('auth');

//update
Route::put('/jobs/{job}', [JobController::class,'update'])->middleware('auth');

Route::delete('/jobs/{job}', [JobController::class,'delete'])->middleware('auth');

Route::get('/register', [UserController::class,'create'])->middleware('guest');

Route::post('/users', [UserController::class,'store']);

Route::post('/logout', [UserController::class,'logout'])->middleware('auth');

Route::get('/login', [UserController::class,'login'])->name('login')->middleware('guest');

Route::post('/users/authenticate', [UserController::class,'authenticate']);

Route::get('/jobs/manage', [JobController::class,'manage'])->middleware('auth');

// must remember to put this at the bottom of the file
//route model binding so that we can use the model in the controller without passing the id
Route::get('/job/{job}', [JobController::class,'show']);