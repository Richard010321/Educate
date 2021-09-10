@extends('layouts.app')
@section('content')
<div class="container">
<div class="card alert alert-success">
<div class="card-header">
BIENVENIDO A EDUCATECOR
PLATAFORMA DE CAPACITACIÓN DOCENTE
  </div>
  <div class="card-body">
      <h2>REGISTRO DE CURSOS</h2>
<p>Complete el siguiente formulario para registrara cursos</p>

<form action="{{url('/cursos')}}" method = "post" enctype="multipart/form-data">

@csrf <!--se necesita en laravel como clave para saber que datos estan enviando-->


<label for="nombre"> Nombre</label>
<input type="text" class="form-control" name="nombre" required>
<br>
<label for="descripcion"> Descripcion</label>
<textarea class="form-control" name="descripcion" rows="3" required></textarea>
<br>

<label for="image"> Imagen:</label>
<input type="file" class="form-control" name="imagen">
<br>
<input type="submit" class="btn btn-success" value="Registrar">
<a href="{{ url('cursos/') }}"  class="btn btn-danger">Atrás</a>

</form>
</div>
</div>
</div>
@endsection