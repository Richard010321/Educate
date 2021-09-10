<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use App\Models\Usuario;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = DB::table('inscripcions')
            ->join('usuarios', 'usuarios.identificacion', '=', 'inscripcions.fkidentificacion')
            ->join('cursos', 'cursos.idcurso', '=', 'inscripcions.fkidcurso')
            ->get();
             // return response()->json($users);

       
        return view('inscripcion.index', compact('cursos')); // mandar los al formulario
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $datos = request()->except('_token');
        $identificacion = $request->input('fkidentificacion');
        $idcurso = $request->input('fkidcurso');
      
        $usuarios = DB::table('usuarios')->where('identificacion', $identificacion)->count();
        $curso = DB::table('inscripcions')->where('fkidcurso', $idcurso)->count();
           if($usuarios == 1 && $curso == 0){
                Inscripcion::insert($datos);
                return redirect('/inscripcion/'.$identificacion);
            }else{
                $datos['cursos'] = Curso::paginate(1000000); // asi mandamos los datos a la plantilla
                return view('cursos.registrarcursos', $datos);
              }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function show($cedula)
    {
        //
        $cursos = DB::table('inscripcions')
            ->join('usuarios', 'usuarios.identificacion', '=', 'inscripcions.fkidentificacion')
            ->join('cursos', 'cursos.idcurso', '=', 'inscripcions.fkidcurso')
            ->get();
        return view('inscripcion.index', compact('cursos')); // mandar los al formulario

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function edit(Inscripcion $inscripcion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inscripcion $inscripcion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function destroy($idinscripcion)
    {
        //
        DB::table('inscripcions')->where('idinscripcion', '=', $idinscripcion)->delete();
        return redirect('inscripcion')->with('mensaje','Usuario Eliminado');
    }
}
