<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use App\Models\Docente;
use App\Models\Estudiante;
use Database\Seeders\EstudianteSeeder;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = $request->get('texto');
        $proyectos = DB::table('proyectos')
            ->select("*")->where('titulo', 'LIKE', '%' . $texto . '%')
            ->orWhere('codigo', 'LIKE', '%' . $texto . '%')
            ->orWhere('modalidad', 'LIKE', '%' . $texto . '%')
            ->orWhere('acta', 'LIKE', '%' . $texto . '%')
            ->orWhere('estado', 'LIKE', '%' . $texto . '%')
            ->orWhere('inicio', 'LIKE', '%' . $texto . '%')
            ->orderByDesc('id')
            ->paginate(10);

        $docentes = Docente::all();
        $estudiantes = Estudiante::all();

        return view('proyectos.index', compact('proyectos', 'docentes', 'estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estudiantes = Estudiante::all();
        return view('proyectos.create', compact('estudiantes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $proyecto = new Proyecto;
        $estudiante1 = $request->get('id_estudiante1');
        $estudiante2 = $request->get('id_estudiante2');
        $estudiante3 = $request->get('id_estudiante1');

        if (Proyecto::where('titulo', $request->titulo)->exists()) {
            Alert::warning('El titulo ya existe');
        } else {
            $proyecto->titulo = $request->get('titulo');
            $proyecto->modalidad = $request->get('modalidad');
            $proyecto->empresa = $request->get('empresa');
            $proyecto->id_estudiante1 = $estudiante1;
            $proyecto->id_estudiante2 = $estudiante2;
            $proyecto->id_estudiante3 = $estudiante3;
            $proyecto->save();

            Alert::success('Modalidad de grado inscrita');
        }

        return redirect('proyectos');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estudiantes = Estudiante::all();
        $docentes = Docente::all();
        $proyecto = Proyecto::findOrFail($id);
        return view('proyectos.show', compact('proyecto', 'estudiantes', 'docentes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $docentes = Docente::all();
        $estudiantes = Estudiante::all();
        $proyecto = Proyecto::findOrFail($id);
        return view('proyectos.edit', compact('proyecto', 'docentes', 'estudiantes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $proyecto = request()->except('_token', '_method');
        Proyecto::where('id', '=', $id)->update($proyecto);
        //Alert::success('Se asigno c??digo, director y evaluador al proyecto de grado');
        return redirect('proyectos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Proyecto::destroy($id);
        Alert::success('Se elimino el proyecto correctamente');
        return redirect('proyectos');
    }
}
