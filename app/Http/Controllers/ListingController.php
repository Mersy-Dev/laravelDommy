<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{   //show or get all listings
    public function index( )
    { 
        dd(request()->all());
        return view('listings.index', [
            'listings' => Listing::all()
        ]);
    }


    //show or get single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }
}
