<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\Proyecto;
use App\Models\Acta;
use Response;
use RealRashid\SweetAlert\Facades\Alert;

class PdfController extends Controller
{

    public function index()
    {
        $actas = Acta::all();
        return view('pdf.actas', compact('actas'));
    }

    function imprimir(Request $request)
    {
        $fecha = $request->get('fecha');
        $proyectos = Proyecto::all()->where('acta', $fecha);
        $docentes = Docente::all();
        $estudiantes = Estudiante::all();

        $acta = new Acta;
        $name = 'Acta-' . $fecha . 'pdf';
        //$path = public_path('pdf/' . 'Acta-' . $fecha . '.pdf');
        $path = storage_path('app/public/actas-pdf/' . 'Acta-' . $fecha . '.pdf');

        $acta->name = 'Acta-' . $fecha;
        $acta->file_path = $path;

        if ((Acta::where('name', $acta->name)->exists()) | (Acta::where('file_path', $acta->file_path)->exists())) {
            //Alert::warning('El acta ya existe');
        } else {
            $acta->save();
        }

        $view = \View::make('pdf.imprimir', compact('proyectos', 'estudiantes', 'docentes', 'acta'));
        $pdf = \PDF::loadHtml($view);

        //$pdf->save(public_path('actas-pdf/' . 'Acta-' . $fecha . '.pdf'));
        $pdf->save(storage_path('app/public/actas-pdf/' . 'Acta-' . $fecha . '.pdf'));

        return $pdf->stream('Acta-' . $fecha . 'pdf');
    }

    public function show($id)
    {
        $acta = Acta::FindorFail($id);
        
        return Response::make(file_get_contents($acta->file_path), 200, [
            'Content-Type' => 'application/pdf',
           ]);
    }
}
