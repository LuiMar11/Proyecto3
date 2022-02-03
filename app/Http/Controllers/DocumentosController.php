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
    public function indexNotas()
    {
        $notas = Notas::all();
        $estudiantes = Estudiante::all();
        return view('pdf.notas', compact('notas', 'estudiantes'));
    }

    public function indexPagos()
    {
        $pagos = Pago::all();
        $estudiantes = Estudiante::all();
        return view('pdf.pagos', compact('pagos', 'estudiantes'));
    }

    public function notas(Request $request)
    {
        $fecha = Carbon::now()->format('Ymd');
        $ced =  $request->get('id_estudiante');

        $notas = new Notas;

        $name = $fecha . '_' . $ced.$request->file('file')->getClientOriginalName();
        $path = Storage::putFileAs('notas', $request->file('file'), $name);

        $notas->name = $name;
        $notas->path = Storage::path($path);
        $notas->id_estudiante = $ced;
        $notas->save();

        return redirect('/notas');
    }

    public function pago(Request $request)
    {
        $fecha = Carbon::now()->format('Ymd');
        $ced =  $request->get('id_estudiante');

        $pago = new Pago;

        $name = $fecha . '_' . $ced .$request->file('file')->getClientOriginalName();
        $path = Storage::putFileAs('pagos', $request->file('file'), $name);

        $pago->name = $name;
        $pago->path = Storage::path($path);
        $pago->id_estudiante = $ced;
        $pago->save();

        return redirect(route('documentos.pagos'));
    }


    public function mostrarNotas($id)
    {
        $notas= Notas::FindorFail($id);
        
        return Response::make(file_get_contents($notas->path), 200, [
            'Content-Type' => 'application/pdf',
           ]);
    }

    public function mostrarPago($id)
    {
        $pago= Pago::FindorFail($id);
        
        return Response::make(file_get_contents($pago->path), 200, [
            'Content-Type' => 'application/pdf',
           ]);
    }
}
