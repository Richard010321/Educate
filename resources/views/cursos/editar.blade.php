@extends('layouts.app')

@section('content')
<div class="container">
<div class="card alert alert-success">
<div class="card-header">
BIENVENIDO A EDUCATECOR
PLATAFORMA DE CAPACITACIÓN DOCENTE
  </div>
  <div class="card-body">
      <h2>ACTUALIZACION DE CURSOS</h2>
<p>Complete el siguiente formulario para actualizar cursos</p>

<form action="{{ url('/cursos/'.$curso->idcurso) }}" method = "post" enctype="multipart/form-data">
@csrf <!--se necesita en laravel como clave para saber que datos estan enviando-->
{{ method_field('PUT')}} <!--CAMBIAR EL MOETODO POST POR EL DELETE-->


<label for="nombre"> Nombre</label>
<input type="text" name="nombre" class="form-control"  value="{{ isset($curso->nombre)?$curso->nombre:''}}" required>
<br>
<label for="descripcion"> Descripcion</label>
<textarea class="form-control" class="form-control"  name="descripcion" value="{{ isset($curso->descripcion)?$curso->descripcion:''}}" rows="3" required >{{ isset($curso->descripcion)?$curso->descripcion:''}}</textarea>
<br>

<label for="image"> Imagen:</label>
<br>
<img src="{{ url('http://localhost/Educate/storage/app/public/'.$curso->imagen) }}" width="100" alt="">
<br>
<input type="file" class="form-control" name="imagen">
<br>
<input type="submit"  class="btn btn-success" value="Editar">
<a href="{{ url('cursos/') }}"  class="btn btn-danger">Atrás</a>

</form>
</div>
</div>
</div>
@endsection