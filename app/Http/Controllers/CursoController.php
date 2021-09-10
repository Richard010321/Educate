<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // para eliminar archivos
use Illuminate\Support\Facades\DB;


class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $datos['cursos'] = Curso::paginate(1000000); // asi mandamos los datos a la plantilla
        return view('cursos.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cursos.registrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosCurso = request()->except('_token');
        if($request->hasfile('imagen')){
            $datosCurso['imagen'] = $request->file('imagen')->store('uploads','public');
        }
        Curso::insert($datosCurso);
        return redirect('cursos')->with('mensaje','Registro exitoso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $datos['cursos'] = Curso::paginate(1000000); // asi mandamos los datos a la plantilla
        return view('cursos.registrarcursos', $datos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit($idcurso)
    {
        //
        $curso = DB::table('cursos')->where('idcurso', $idcurso)->first();
        return view('cursos.editar', compact('curso')); // mandar los al formulario
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idcurso)
    {
        //
        $datosCurso = request()->except('_token','_method');

          
        if($request->hasfile('imagen')){

            $cursos = DB::table('cursos')->where('idcurso', $idcurso)->first();
            Storage::delete('public/'.$cursos->imagen); // eliminar la foto
            $datosCurso['imagen'] = $request->file('imagen')->store('uploads','public');
        }

          Curso::where('idcurso','=',$idcurso)->update($datosCurso);

          $cursos = DB::table('cursos')->where('idcurso', $idcurso)->first();
          return redirect('cursos')->with('mensaje','Registro actualizado');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy($idcurso)
    {
        //

        $cursos = DB::table('cursos')->where('idcurso', $idcurso)->first();
        
        Storage::delete('public/'.$cursos->imagen); // eliminar la foto
        DB::table('cursos')->where('idcurso', '=', $idcurso)->delete();
        return redirect('cursos')->with('mensaje','Usuario Eliminado');

    }
}
