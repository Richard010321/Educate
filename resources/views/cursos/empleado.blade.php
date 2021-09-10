@extends('layouts.app')

@section('content')
<div class="container">




@if(Session::has('mensaje'))
<div class="alert alert-primary" role="alert">
{{ Session::get('mensaje') }}
</div>
@endif



<a type="button" class="btn btn-primary" href="{{ url ('empleado/create') }}">Nuevo</a>


<table class="table table">
    <thea class="thead_light">
        <tr>
            <th>No.</th>
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>

    </thead>
    <tbody>
        @foreach($empleados as $empl)
        <tr>
            <td>{{ $empl->id }}</td>
            <td>{{ $empl->dni }}</td>
            <td>{{ $empl->nombres }}</td>
            <td>{{ $empl->apellidos }}</td>
            <td>{{ $empl->correo }}</td>
            <td><img src="{{ asset('storage').'/'.$empl->imagen}}" width="100" alt=""></td>
            <td>

            <a href="{{url('/empleado/'.$empl->id.'/edit/')}}" type="button" class="btn btn-success">Editar</a>
               
                <form action="{{url('/empleado/'.$empl->id)}}" method="POST">
                @csrf
                {{ method_field('DELETE')}} <!--CAMBIAR EL MOETODO POST POR EL DELETE-->
                <input  class="btn btn-danger" type="submit" onclick="return confirm('Desea eliminar la infomracion')" value="Eliminar">
        </form>
    </td>

        </tr>
        @endforeach
    </tbody>


</table>
{!! $empleados->links()!!}
</div>
@endsection