<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Offer;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('role:admin')->only(['create', 'store', 'edit', 'update', 'destroy']);
    //     $this->middleware('permission:manage offers')->only(['create', 'store', 'edit', 'update', 'destroy']);
    // }

    public function index()
    {
        $offers = Offer::with('user')->latest()->paginate(3);
        
        return view('dashboard',['offers' => $offers]);
    }

    
    public function create()
    {
        return view('offers.create');
    }


    public function store(Request $request)
    {
        {
            $request->validate([
                'title' => ['required'],
                'salary' => ['required']
            ]);
        
            $offer = Offer::create([
                'enterprise_name' => $request->input('enterprise_name'),
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'salary' => $request->input('salary'),
                'location' => $request->input('location'),
                'user_id' => Auth::id(),
            ]);
        
            return redirect('/offers')
                ->with('status', 'Offer created successfully!');
        }
    }

    public function show(Offer $offer)
    {
        return view('offers.show', ['offer' => $offer]);
    }
    

    public function edit(Offer $offer)
    {
        return view('offers.edit', compact('offer'));
    }

    public function update(Request $request, Offer $offer)
    {
        $request->validate([
            'title' => ['required'],
            'salary' => ['required']
        ]);
    
        $offer->update($request->all());
    
        return redirect()->route('offers.show', ['offer' => $offer])->with('status', 'Oferta actualizada correctamente.');
    }

    public function destroy(Offer $offer)
{
    $offer->delete();

    return back()->with('status', 'Oferta eliminada correctamente.');
}
}
