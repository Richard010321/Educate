@extends('layouts.app')

@section('content')
<div class="container">

<div class="card">
<div class="card-header alert alert-success">
BIENVENIDO A EDUCATECOR
PLATAFORMA DE CAPACITACIÓN DOCENTE
  </div>
  <div class="card-body">

  @if(Session::has('mensaje'))
<div  class="alert alert-warning alert-dismissible fade show" role="alert">
{{ Session::get('mensaje') }}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif


<a type="button" class="btn btn-primary" href="{{ url ('cursos/create') }}">Nuevo Curso</a>

<br/><br/>
<div class="table-responsive">
<table class="table table">
    <thea class="thead_light">
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Imagen</th>
            <th>Actualizar</th>
            <th>Eliminar</th>
        </tr>

    </thead>
    <tbody>
        @foreach($cursos as $cur)
        <tr>
         
            <td>{{ $cur->nombre }}</td>
            <td>{{ $cur->descripcion }}</td>
            <td><img src="{{ url('http://localhost/Educate/storage/app/public/'.$cur->imagen) }}" width="100" alt=""></td>
            <td>

            <a href="{{url('/cursos/'.$cur->idcurso.'/edit/')}}" type="button" class="btn btn-success">Editar</a></td>
            <td>
                <form action="{{url('/cursos/'.$cur->idcurso)}}" method="POST">
                @csrf
                {{ method_field('DELETE')}} <!--CAMBIAR EL MOETODO POST POR EL DELETE-->
                <input  class="btn btn-danger" type="submit" onclick="return confirm('Desea eliminar la infomracion')" value="Eliminar">
        </form>
    </td>

        </tr>
        @endforeach
    </tbody>


</table>
</div>
</div>
</div>
</div>
@endsection