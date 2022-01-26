<?php

namespace App\Http\Controllers;

use App\Models\Notas;
use Illuminate\Http\Request;
use App\Models\Estudiante;

class NotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pdf.documentos');
    }

    public function fileUpload(Request $req, $id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $req->validate([
            'file' => 'required|mimes:pdf|max:2048'
        ]);

        $fileModel = new Notas;
        if ($req->file()) {
            $fileName = time() . '_' . $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads/pago', $fileName, 'public');

            $fileModel->name = time() . '_' . $req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->id_estudiante = $estudiante->cedula;
            $fileModel->save();

            return back()
                ->with('success', 'Archivo cargado corectamente.')
                ->with('file', $fileName);
        }
    }
}
