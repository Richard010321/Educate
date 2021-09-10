@extends('layouts.headeru')

@section('content')
<div class="container">
@if(Session::has('mensaje'))
<div  class="alert alert-warning alert-dismissible fade show" role="alert">
{{ Session::get('mensaje') }}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<div class="card">
<div class="card-header alert alert-success">
BIENVENIDO A EDUCATECOR
PLATAFORMA DE CAPACITACIÓN DOCENTE
  </div>
  <div class="card-body">


  <div class="row">
        @foreach($cursos as $cur)
        
 
    <div class="col">
    <div class="card" style="width: 18rem;">
   <img src="{{ url('http://localhost/Educate/storage/app/public/'.$cur->imagen) }}" class="card-img-top" alt="...">
    <div class="card-body">
    <h5 class="card-title">{{ $cur->nombre }}</h5>
    <p class="card-text">{{ $cur->descripcion }}</p>

    <form action="{{url('/inscripcion')}}" method = "post">

@csrf <!--se necesita en laravel como clave para saber que datos estan enviando-->


<label for="identificacion"> ingrese su identificación</label>
<input type="hidden" class="form-control" name="fkidcurso" value="{{ isset($cur->idcurso)?$cur->idcurso:''}}" required>
<input type="number" class="form-control" name="fkidentificacion" required>
<br>
<input type="submit" class="btn btn-success" value="Registrar">

</form>
  </div>
  

</div>
      
    </div>
  
        @endforeach
        </div>
       
</div>
</div>
</div>
@endsection