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
// Route::get('/', [App\Http\Controllers\ListingController::class, 'index'])->name('home');
 Route::get('/', [App\Http\Controllers\ListingController::class, 'index']);


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














//route model binding
Route::get('/listing/{listing}', [App\Http\Controllers\ListingController::class, 'show']);