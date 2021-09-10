@extends('layouts.header')

@section('content')
<div class="container">

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
  </div>
</div>
      
    </div>
  
        @endforeach
        </div>
       
</div>
</div>
</div>
@endsection