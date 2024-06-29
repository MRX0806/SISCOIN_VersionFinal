<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archivo;


class ArchivoController extends Controller
{
    public function create()
    {
        return view('archivo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'archivo' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $file = $request->file('archivo');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads', $fileName, 'public');

        Archivo::create([
            'nombre' => $request->nombre,
            'archivo' => $filePath,
        ]);

        return back()->with('success', 'Archivo subido y registrado correctamente.');
    }
}
