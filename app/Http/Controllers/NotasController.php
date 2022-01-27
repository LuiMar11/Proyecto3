<?php

namespace App\Http\Controllers;

use App\Models\Notas;
use Illuminate\Http\Request;
use App\Models\Estudiante;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Response;

class NotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notas = Notas::all();
        $estudiantes = Estudiante::all();
        return view('pdf.documentos', compact('notas', 'estudiantes'));
    }

    public function upload(Request $req, $id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $fecha = Carbon::now()->format('Ymd');

        $req->validate([
            'file' =>'required|mimes:pdf|max:2048'
        ]);

        $notas = new Notas;

        if($req->file()){
            $nombre = $fecha.'_ExtendidoDeNotas'.$estudiante->nombre.$estudiante->apellido;
            $ruta = $req->file('file')->storeAs('notas',$nombre,'public');

            $notas->name = $nombre;
            $notas->file_path = '/storage/'.$ruta;
            $notas->id_estudiante = $estudiante->cedula;
            $notas->save();
            
            return redirect('/notas')->with('success', Alert::success('Extendido de notas guardado en la base de datos'));

        }

    }

    public function mostrarNotas($id)
    {
        
    }
}
