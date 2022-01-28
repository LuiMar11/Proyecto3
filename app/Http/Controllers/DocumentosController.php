<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Notas;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Response;

class DocumentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notas = Notas::all();
        $pagos = Pago::all();
        $estudiantes = Estudiante::all();
        return view('pdf.documentos', compact('notas', 'estudiantes', 'pagos'));
    }

    public function notas(Request $request)
    {
        $fecha = Carbon::now()->format('Ymd');
        $ced =  $request->get('id_estudiante');

        $notas = new Notas;

        $name = $fecha . '_' . $request->file('file')->getClientOriginalName();
        $path = Storage::putFileAs('notas', $request->file('file'), $name);

        $notas->name = $name;
        $notas->path = Storage::path($path);
        $notas->id_estudiante = $ced;
        $notas->save();

        return redirect('documentos');
    }

    public function pago(Request $request)
    {
        $fecha = Carbon::now()->format('Ymd');
        $ced =  $request->get('id_estudiante');

        $pago = new Pago;

        $name = $fecha . '_' . $request->file('file')->getClientOriginalName();
        $path = Storage::putFileAs('pagos', $request->file('file'), $name);

        $pago->name = $name;
        $pago->path = '/storage/' . $path;
        $pago->id_estudiante = $ced;
        $pago->save();

        return redirect('documentos');
    }


    public function mostrarNotas($id)
    {
        $notas= Notas::FindorFail($id);
        
        return Response::make(file_get_contents($notas->path), 200, [
            'Content-Type' => 'application/pdf',
           ]);
    }
}
