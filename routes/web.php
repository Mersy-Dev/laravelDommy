<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;


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
//all listings
Route::get('/', function () {
    return view('listing',  [
        'name' => 'James',
        'listings' => Listing::all()
    ]);
});

//single listing
Route::get('/listing/{id}', function ($id) {
    return view('single-listing', [
        'listing' => Listing::find($id)
    ]);
});
 
Route::get('/dbconn', function(){
    return view('dbconn');
});



// Route::get('/post/{id}', function ($id) {
//     return response('Post '.$id);
// }) ->where('id', '[0-9]+');

// Route::get('/search', function (Request $request) {
//     dd($request);
// });
