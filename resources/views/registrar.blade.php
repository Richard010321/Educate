@extends('layouts.header')
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
      <p>REGISTRO DE USUARIOS<br/>
Complete el siguiente formulario para registrarse</p>
<form action="{{url('/usuario')}}"  method = "post">

@csrf <!--se necesita en laravel como clave para saber que datos estan enviando-->
<label for="nombre"> Nombre</label>
<input type="hidden" class="form-control" value ="1" name="control" required>

<input type="text" class="form-control" name="nombres" required>
<br>
<label for="apellido"> Apellido</label>
<input type="text" class="form-control" name="apellidos" required>
<br>
<label for="apellido"> Tipo de Documento</label>
<select class="form-control" aria-label="Default select example" name="tipoidentificacion">
  <option value="CC">Cedula Ciudadania</option>
  <option value="CE">Cedula Extrangera</option>
  <option value="PS">Pasaporte</option>
</select>
<br>
<label for="identificacion"> Cedula</label>
<input type="number" class="form-control" name="identificacion" required >
<br>

<label for="celular"> Celular</label>
<input type="number" class="form-control" name="celular" required >
<br>

<label for="correo"> Correo:</label>
<input type="email" class="form-control" name="correo" required>
<br>

<label for="contrasena"> Contraseña:</label>
<input type="password" class="form-control" name="contrasena" required>
<br>
<input type="hidden" class="form-control" name="tipo" value="2" required>

<input type="submit" class="btn btn-success" value="Registrarse">
</form>

</div>
</div>
</div>
@endsection