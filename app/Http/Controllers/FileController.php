<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Storage; 

class FileController extends Controller
{
    public function uploadfile(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx|max:2048', 
        ]);

        $user = Auth::user();
        
        $path = $request->file('file')->store('files', 'public');

        if ($user->file) {
            Storage::disk('public')->delete($user->file->file_path); 
            $user->file->delete(); 
        }


        $file = new File([
            'file_path' => $path,
            'file_type' => $request->file('file')->getClientMimeType(),
        ]);

        $file->user()->associate($user);
        $file->save();

        return back()->with('status', 'Hoja de Vida Subida Correctamente.');
    }
    public function downloadFile($id)
    {
        $file = file::findOrFail($id);
        $filePath = $file->file_path;

        if (Storage::disk('public')->exists($filePath)) {
            return response()->download(storage_path('app/public/' . $filePath));
        }

        return back()->with('error', 'El archivo no existe.');
    }
}
