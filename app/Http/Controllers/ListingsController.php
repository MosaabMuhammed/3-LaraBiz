<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;

class ListingsController extends Controller
{
    public function __construct(){
        return $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listings = Listing::latest()->get();
        return view('index', compact('listings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the listing data from the form
        $this->validate($request, [
            'Name'  => 'required',
            'Email' => 'email'
        ]);

        // create a new listing
        $listing = new Listing;
        $listing->name      = $request->input('Name');
        $listing->email     = $request->input('Email');
        $listing->website   = $request->input('Website');
        $listing->address   = $request->input('Address');
        $listing->phone     = $request->input('Phone');
        $listing->bio       = $request->input('Bio');
        $listing->user_id   = auth()->user()->id;

        // Save the data into the database
        $listing->save();

        return redirect('/home')->with('success', 'Listing Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listing = Listing::find($id);
        return view('show', compact('listing'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listing = Listing::find($id);
        return view('edit', compact('listing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $listing = Listing::find($id);
        $listing->name      = $request->input('Name');
        $listing->email     = $request->input('Email');
        $listing->website   = $request->input('Website');
        $listing->address   = $request->input('Address');
        $listing->phone     = $request->input('Phone');
        $listing->bio       = $request->input('Bio');
        $listing->user_id   = auth()->user()->id;

        $listing->save();

        return redirect('/home')->with('success', 'Listing Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listing = Listing::find($id);
        $listing->delete();

        return redirect('/home')->with('success', 'Listing Removed!');
    }
}
