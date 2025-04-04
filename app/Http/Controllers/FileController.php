<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File; // Import the File model
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use Illuminate\Support\Facades\Storage; // Import the Storage facade

class FileController extends Controller
{
    public function uploadfile(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx|max:2048', // Asegurar tipo y tamaño
        ]);

        $user = Auth::user();
        
        // Guardar el archivo en storage/app/public/files
        $path = $request->file('file')->store('files', 'public');

        // Si ya tiene un archivo, eliminarlo antes de guardar el nuevo
        if ($user->file) {
            Storage::disk('public')->delete($user->file->file_path); // Borra el archivo del almacenamiento
            $user->file->delete(); // Borra el registro de la base de datos
        }

        // Crear el registro del archivo
        $file = new File([
            'file_path' => $path,
            'file_type' => $request->file('file')->getClientMimeType(),
        ]);

        $file->user()->associate($user);
        $file->save();

        return back()->with('status', 'Hoja de vida subida correctamente.');
    }
    public function downloadFile($id)
    {
        $file = file::findOrFail($id);
        $filePath = $file->file_path;

        // Verificar si el archivo existe
        if (Storage::disk('public')->exists($filePath)) {
            return response()->download(storage_path('app/public/' . $filePath));
        }

        return back()->with('error', 'El archivo no existe.');
    }
}
