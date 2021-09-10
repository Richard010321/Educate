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

<table class="table table">
    <thea class="thead_light">
        <tr>
           <th>Nombres</th>
            <th>Apellidos</th>
            <th>Tipo Identificacion</th>
            <th>Identificacion</th>
            <th>Correo</th>
            <th>Celular</th>
            <th>Contraseña</th>
            <th>Actualizar</th>
            <th>Eliminar</th>

        </tr>

    </thead>
    <tbody>
        @foreach($usuarios as $usu)
        <tr>
            <td>{{ $usu->nombres }}</td>
            <td>{{ $usu->apellidos }}</td>
            <td>{{ $usu->tipoidentificacion }}</td>
            <td>{{ $usu->identificacion }}</td>
            <td>{{ $usu->correo }}</td>
            <td>{{ $usu->celular }}</td>
            <td>{{ $usu->contrasena }}</td>
            <td>

            <a href="{{url('/usuario/'.$usu->idusuario.'/edit/')}}" type="button" class="btn btn-success">Editar</a>
            </td>
            <td>
                <form action="{{url('/usuario/'.$usu->idusuario)}}" method="POST">
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
@endsection