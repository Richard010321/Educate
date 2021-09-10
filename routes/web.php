<?php
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController; // llamar el ontrolador empleado
use App\Http\Controllers\UsuarioController; // llamar el ontrolador usuario
use App\Http\Controllers\CursoController; // llamar el ontrolador usuario
use App\Http\Controllers\InscripcionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('auth.login');
     return view('index');

});

Route::get('/iniciar', function () {
    return view('iniciar');

});

Route::get('/registrar', function () {
    return view('registrar');
});

Route::get('/mostrar', function () {
$datos['cursos'] = Curso::paginate(1000000); // asi mandamos los datos a la plantilla
return view('cursos.cursos', $datos);
});



Route::resource('empleado',EmpleadoController::class); // parra accedewr todas las url del navegador y el metodo -- middleware validar el login y no acceder sin antes logearnos 
Route::resource('usuario',UsuarioController::class); // parra accedewr todas las url del navegador y el metodo -- middleware validar el login y no acceder sin antes logearnos 
Route::resource('cursos',CursoController::class); // parra accedewr todas las url del navegador y el metodo -- middleware validar el login y no acceder sin antes logearnos 
Route::resource('inscripcion',InscripcionController::class); // parra accedewr todas las url del navegador y el metodo -- middleware validar el login y no acceder sin antes logearnos 

/*
Auth::routes(['register'=>false,'reset'=>false, 'remember'=>false]); // quitar registrar y recuperar contrasena

Route::get('/home', [EmpleadoController::class, 'index'])->name('home'); // cambiar l home de auth por el crud

Route::group(['middleware' => 'auth'], function (){
    Route::get('/index', [EmpleadoController::class, 'index'])->name('home'); // cambiar l home de auth por el crud

});*/
