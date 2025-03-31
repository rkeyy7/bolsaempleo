<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offers = Offer::with('user')->latest()->paginate(5);
        
        return view('dashboard',['offers' => $offers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('offers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            $request->validate([
                'title' => ['required', 'min:3'],
                'salary' => ['required']
            ]);
        
            $offer = Offer::create([
                'enterprise_name' => $request->input('enterprise_name'),
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'salary' => $request->input('salary'),
                'location' => $request->input('location'),
                'user_id' => 1
            ]);
        
            return redirect('/offers')
                ->with('status', 'Offer created successfully!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Offer $offer)
    {
        return view('offers.show', ['offer' => $offer]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
