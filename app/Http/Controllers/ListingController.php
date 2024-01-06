<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{   //show or get all listings
    public function index()
    {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->simplePaginate(6)
        ]);
    }


    //show or get single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    //create new listing
    public function create()
    {
        return view('listings.create');
    }

    //save new listing
    // public function store()
    // {
    //     $listing = new Listing();

    //     $listing->title = request('title');
    //     $listing->body = request('body');
    //     $listing->save();

    //     return redirect('/')->with('mssg', 'Thanks for your listing');
    // }

    //save new listing  
    public function store(Request $request)
    {
        $formFields = $request->validate([
            // 'company' => ['required', 'max:255', Rule::unique('listings', 'company')->where(function ($query) {
            //     return $query->where('user_id', auth()->id());
            // })],
            'company' => ['required', 'max:255', Rule::unique('listings', 'company')],
            'title' => 'required|max:255',
            'location' => 'required|max:255',
            'email' => 'required|max:255',
            // 'email' => ['required', 'email', 'max:255', Rule::unique('listings', 'email')],
            'website' => 'required|max:255',
            'tags' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }


        //    Listing::create($formFields + ['user_id' => auth()->id()]);
        Listing::create($formFields);


        return redirect('/')->with('mssg', 'Thanks for your listing');
    }

    //show edit listing
    public function edit(Listing $listing)
    {
        return view('listings.edit', compact('listing'));
    }

    //save edited listing
    public function update(Listing $listing, Request $request)
    {
        $formFields = request()->validate([
            'company' => ['required', 'max:255'],
            'title' => 'required|max:255',
            'location' => 'required|max:255',
            'email' => ['required', 'email', 'max:255'],
            'website' => 'required|max:255',
            'tags' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        if(request()->hasFile('logo')){
            $formFields['logo'] = request()->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return back()->with('mssg', 'Listing updated succesfully');
    }

    //delete listing
    public function destroy(Listing $listing)
    {
        $listing->delete();

        return redirect('/')->with('mssg', 'Listing deleted succesfully');
    }
}
