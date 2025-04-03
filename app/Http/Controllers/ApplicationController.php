<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;

class ApplicationController extends Controller
{
    // Permitir solo a usuarios autenticados postularse
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // Método para postularse a un trabajo
    public function index()
    {
        // Obtener todas las postulaciones del usuario autenticado
        $user = Auth::user();
        $applications = Application::where('user_id', $user->id)->paginate(3);
        
        return view('applications.index', compact('applications'));
    }
    public function showmyoffers()
    {
        $user = Auth::user();
        $myoffers = Offer::where('user_id', $user->id)->paginate(3);
        return view('applications.myoffers', compact('myoffers'));
    }

    public function offersApplications($id)
    {
        $applications = Application::where('offer_id', $id)->paginate(3);
        return view('applications.offerapplications', compact('applications'));
    }

    public function apply(Request $request, $id)
    {
        // Obtener el trabajo al que se postula
        
        $user = Auth::user();
        $offer = Offer::findOrFail($id);
        $file = $user->file;

        $existingApplication = Application::where('user_id', $user->id)
        ->where('offer_id', $offer->id)
        ->first();

        if ($existingApplication) {
            return redirect()->back()->with('error', 'Ya te has postulado a esta oferta.');
        }
    
        // Verificar si el usuario tiene un archivo (hoja de vida) subido
        if (!$user->file) {
            return redirect()->back()->with('error', 'Debes subir tu hoja de vida antes de postularte.');
        }

        if (!$user->file) {
            return redirect()->back()->with('error', 'Debes subir tu hoja de vida antes de postularte.');
        }
        else {  
            Application::create([
            'user_id' => $user->id,
            'offer_id' => $offer->id,
            'file_id' => $file->id,
            'status' => 'pending',
        ]);
        return redirect()->route('offers.index')->with('status', 'Postulación enviada.');
        // return back()->with('status', 'Postulación enviada.');
        }
        
    }

    public function updateStatus(Request $request, Application $application)
    {
        $request->validate(['status' => 'required|in:accepted,rejected,pending']);
    
        $application->update(['status' => $request->status]);
    
        return redirect()->back()->with('status', 'Estado actualizado correctamente.');
    }
    

}


