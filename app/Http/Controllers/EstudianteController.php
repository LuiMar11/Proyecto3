<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = $request->get('texto');
        $estudiantes = DB::table('estudiantes')
            ->select(
                'id',
                'cedula',
                'nombre',
                'apellido',
                'genero',
                'email',
                'programa',
                'estado'
            )->where('nombre', 'LIKE', '%' . $texto . '%')
            ->orWhere('apellido', 'LIKE', '%' . $texto . '%')
            ->orWhere('cedula', 'LIKE', '%' . $texto . '%')
            ->orderByDesc('id')
            ->paginate(10);

        return view('estudiantes.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estudiantes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estudiante = request()->except('_token');
        if ((Estudiante::where('cedula', $request->cedula)->exists()) | Estudiante::where('email', $request->email)->exists()) {
            Alert::warning('El estudiante ya existe');
        } else {
            Estudiante::insert($estudiante);
            Alert::success('Estudiante inscrito a la base de datos');
        }
        return redirect('/estudiantes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $user = User::all()->where('email', $estudiante->email);
        
        $proyectos = DB::table('proyectos')->select('*')
        ->where('id_estudiante1',$id)
        ->orWhere('id_estudiante2',$id)
        ->orWhere('id_estudiante3',$id)->get();

        $docentes = Docente::all();
        return view('estudiantes.show', compact('estudiante', 'user', 'proyectos', 'docentes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        return view('estudiantes.edit', compact('estudiante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $estudiante = request()->except('_token', '_method');
        Estudiante::where('id', '=', $id)->update($estudiante);
        $estudiante = Estudiante::findOrFail($id);
        Alert::success('Estudiante editado correctamente');
        return redirect('estudiantes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Estudiante::destroy($id);
        Alert::success('Estudiante eliminado correctamente');
        return redirect('estudiantes');
    }
}
