<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\Proyecto;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = $request->get('texto');
        $docentes = DB::table('docentes')
            ->select(
                'id',
                'cedula',
                'nombre',
                'apellido',
                'genero',
                'email',
                'nivel',
                'contratacion'
            )->where('nombre', 'LIKE', '%' . $texto . '%')
            ->orWhere('apellido', 'LIKE', '%' . $texto . '%')
            ->orWhere('cedula', 'LIKE', '%' . $texto . '%')
            ->paginate(10);

        return view('docentes.index', compact('docentes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('docentes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $docente = request()->except('_token');
        if ((Docente::where('cedula', $request->cedula)->exists()) | (Docente::where('email', $request->email)->exists())) {
            Alert::warning('El docente ya existe');
        } else {
            Docente::insert($docente);
            Alert::success('Docente inscrito a la base de datos');
        }
        return redirect('/docentes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $docente = Docente::findOrFail($id);
        $proyectos = Proyecto::all();
        $estudiantes = Estudiante::all();
        return view('docentes.show', compact('docente', 'proyectos', 'estudiantes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $docente = Docente::findOrFail($id);
        return view('docentes.edit', compact('docente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = request()->except('_token', '_method');
        Docente::where('id', '=', $id)->update($datos);
        $docente = Docente::findOrFail($id);
        Alert::success('Docente editado correctamente');
        return redirect('docentes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Docente::destroy($id);
        Alert::success('Docente eliminado correctamente');
        return redirect('docentes');
    }
}
