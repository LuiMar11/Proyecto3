<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use App\Models\Docente;
use App\Models\Estudiante;
use Database\Seeders\EstudianteSeeder;
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
            ->select(
                'id',
                'codigo',
                'titulo',
                'modalidad',
                'id_estudiante1',
                'id_estudiante2',
                'id_estudiante3',
                'id_director',
                'id_evaluador',
                'acta',
                'estado',
                'inicio',
                'fin',
                'observaciones'

            )->where('titulo', 'LIKE', '%' . $texto . '%')
            ->orWhere('codigo', 'LIKE', '%' . $texto . '%')
            ->orWhere('modalidad', 'LIKE', '%' . $texto . '%')
            ->orWhere('acta', 'LIKE', '%' . $texto . '%')
            ->orWhere('estado', 'LIKE', '%' . $texto . '%')
            ->orWhere('inicio', 'LIKE', '%' . $texto . '%')
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
        $proyecto = request()->except('_token');
        Proyecto::insert($proyecto);
        Alert::success('Modalidad de grado inscrita');
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
        $proyecto = Proyecto::findOrFail($id);
        return view('proyectos.edit', compact('proyecto','docentes'));
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
        //Alert::success('Se asigno código, director y evaluador al proyecto de grado');
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
