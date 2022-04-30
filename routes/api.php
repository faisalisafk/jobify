<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
// using /api/posts here
Route::get('/posts', function () {
    return response()->json([
        'posts' => [
            'id' => 1,
            'title' => 'My first post',
            'body' => 'This is the body of my first post'
        ]
    ]);
});
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
