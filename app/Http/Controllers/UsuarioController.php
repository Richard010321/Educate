<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['usuarios'] = Usuario::paginate(1000000); // asi mandamos los datos a la plantilla
        return view('usuario.index', $datos);
    }

    public function cursos()
    {
        $datos['usuarios'] = Usuario::paginate(1000000); // asi mandamos los datos a la plantilla
        return view('usuario.cursos', $datos);
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
        $datosUsuarios = request()->except('_token','control');
        $control = $request->input('control');
        $usuario = $request->input('email');
        $contrasena = $request->input('password');
        if($control=="1"){
            Usuario::insert($datosUsuarios);
            return redirect('/')->with('mensaje','Registro actualizado');
        }else{
            $usuarios = DB::table('usuarios')->where('correo', $usuario)->first();

            if($usuarios->correo == $usuario && $usuarios->contrasena == $contrasena){

                if($usuarios->tipo == 1){
                 return redirect('/usuario');
                }else{
                      $datos['cursos'] = Curso::paginate(1000000); // asi mandamos los datos a la plantilla
                      return view('cursos.registrarcursos', $datos);
                }
            }else{
               return redirect('/iniciar');
            }
            
        
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($idusuario)
    {
        //
        $usuario = DB::table('usuarios')->where('idusuario', $idusuario)->first();
        return view('usuario.editar', compact('usuario')); // mandar los al formulario
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idusuario)
    {
        //
        $datosUsuarios = request()->except('_token','_method');
        Usuario::where('idusuario','=',$idusuario)->update($datosUsuarios);
        return redirect('usuario')->with('mensaje','Registro actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($idusuario)
    {
        //
        DB::table('usuarios')->where('idusuario', '=', $idusuario)->delete();
        return redirect('usuario')->with('mensaje','Usuario Eliminado');

    }
}
