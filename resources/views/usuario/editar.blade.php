@extends('layouts.app')
@section('content')
<div class="container">
@if(Session::has('mensaje'))
<div class="alert alert-primary" role="alert">
{{ Session::get('mensaje') }}
</div>
@endif
<div class="card alert alert-success">
<div class="card-header">
BIENVENIDO A EDUCATECOR
PLATAFORMA DE CAPACITACIÓN DOCENTE
  </div>
  <div class="card-body">
      <p>ACTUALIZACION DE USUARIOS<br/>
Complete el siguiente formulario para registrarse</p>
<form action="{{ url('/usuario/'.$usuario->idusuario) }}" method = "post">
@csrf <!--se necesita en laravel como clave para saber que datos estan enviando-->
{{ method_field('PUT')}} 

<label for="nombre"> Nombre</label>
<input type="text" class="form-control" name="nombres" value="{{ isset($usuario->nombres)?$usuario->nombres:''}}" required>
<br>
<label for="apellido"> Apellido</label>
<input type="text" class="form-control" name="apellidos" value="{{ isset($usuario->apellidos)?$usuario->apellidos:''}}" required>
<br>
<label for="apellido"> Tipo de Documento</label>
<select class="form-control" aria-label="Default select example" name="tipoidentificacion">
  <option value="CC">Cedula Ciudadania</option>
  <option value="CE">Cedula Extrangera</option>
  <option value="PS">Pasaporte</option>
</select>
<br>
<label for="identificacion"> Cedula</label>
<input type="number" class="form-control" name="identificacion"  value="{{ isset($usuario->identificacion)?$usuario->identificacion:''}}" required >
<br>

<label for="celular"> Celular</label>
<input type="number" class="form-control" name="celular" value="{{ isset($usuario->celular)?$usuario->celular:''}}" required >
<br>

<label for="correo"> Correo:</label>
<input type="email" class="form-control" name="correo"  value="{{ isset($usuario->correo)?$usuario->correo:''}}" required>
<br>

<label for="contrasena"> Contraseña:</label>
<input type="password" class="form-control" name="contrasena" value="{{ isset($usuario->contrasena)?$usuario->contrasena:''}}" required>
<br>

<input type="submit" class="btn btn-success" value="Actualizar">
</form>

</div>
</div>
</div>
@endsection