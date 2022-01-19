<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestActa;
use Illuminate\Http\Request;
use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\Proyecto;
use App\Models\Acta;
use RealRashid\SweetAlert\Facades\Alert;

class PdfController extends Controller
{
    function imprimir(Request $request)
    {   
        $fecha = $request->get('fecha');
        $proyectos = Proyecto::all()->where('inicio',$fecha);
        $docentes = Docente::all();
        $estudiantes = Estudiante::all();

        $acta = new Acta;
        $name = 'Acta-' . $fecha . 'pdf';
        $path = public_path('pdf/' . 'Acta-' . $fecha . '.pdf');
        //$path = storage_path('app/public/actas/'.'Acta-'.Carbon::now()->format('d-m-Y').'.pdf');
       
        $acta->name = 'Acta-' . $fecha;
        $acta->file_path = $path;
        //$acta->file_path = storage_path('app/public/actas/' . 'Acta-' . Carbon::now()->format('d-m-Y') . '.pdf');
        $acta->save();
       
        $view = \View::make('pdf.imprimir', compact('proyectos','estudiantes','docentes','acta'));
        $pdf = \PDF::loadHtml($view);
       
        $pdf->save(public_path('pdf/' . 'Acta-' . $fecha . '.pdf'));
        
        //$pdf->save(storage_path('app/public/actas/' . 'Acta-' . Carbon::now()->format('d-m-Y') . '.pdf'));
        return $pdf->stream('Acta-' /* . Carbon::now()->format('d-m-Y')  */ . 'pdf');
    }

    function mostrar()
    {
        $proyectos = Proyecto::all();
        $docentes = Docente::all();
        $estudiantes= Estudiante::all();

        $view = \View::make('pdf.imprimir', compact('proyectos','estudiantes','docentes'));
        $pdf = \PDF::loadHtml($view);
        return $pdf->stream();
    }
}
