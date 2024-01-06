<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;


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
// Route::get('/', [App\Http\Controllers\ListingController::class, 'index'])->name('home');
 Route::get('/', [ListingController::class, 'index']);


//single listing

//eloquent model 
// Route::get('/listing/{id}', function ($id) {
//     $listing = Listing::find($id);  

//     if ($listing) {
//         return view('single-listing', [
//             'listing' => $listing
//         ]);
//     } else {
//         abort(404);
//     }
// });




Route::get('/dbconn', function () {
    return view('dbconn');
});



// Route::get('/post/{id}', function ($id) {
//     return response('Post '.$id);
// }) ->where('id', '[0-9]+');

// Route::get('/search', function (Request $request) {
//     dd($request);
// });

//list of seven common resources routes
//index - show all listings
//show - show single listing
//create - show form to create new listing
//store - save new listing
//edit - show form to edit listing
//update - save edited listing
//destroy - delete listing

//show create form
Route::get('/listings/create', [App\Http\Controllers\ListingController::class, 'create']);


//save new listing
Route::post('/listings', [App\Http\Controllers\ListingController::class, 'store']);

//show edit form
Route::get('/listings/{listing}/edit', [App\Http\Controllers\ListingController::class, 'edit']);

//save edited listing
Route::put('/listings/{listing}', [App\Http\Controllers\ListingController::class, 'update']);

//delete listing
Route::delete('/listings/{listing}', [App\Http\Controllers\ListingController::class, 'destroy']);

//route model binding
Route::get('/listing/{listing}', [App\Http\Controllers\ListingController::class, 'show']);

//show register form
Route::get('/register', [UserController::class, 'create']);

//save new user
Route::post('/users', [UserController::class, 'store']);

//log user out
Route::post('/logout', [UserController::class, 'destroy']);

//show login form
Route::get('/login', [UserController::class, 'login']);

//log user in
Route::post('/users/authenticate', [UserController::class, 'authenticate']);