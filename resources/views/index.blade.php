@extends('layouts.header')
@section('content')


<div class="container">
<center >
            <h1 class="titulo">EDUCATECOR</h1>
            <h2 class="titulo">PLATAFORMA DE CAPACITACIÓN DOCENTE</h2>
            <h3 class="titulo">Te apoyamos y te instruimos con el mejor equipo</h3>


            </center>

            <div class="container">
  <div class="row">
    <div class="col">
    <div class="card" >
    <img src="{{ asset('storage/perfil1.jpg') }}" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text">Jesus Burgos Huertas - Ingeniero de Sistemas</p>
  </div>
</div>    </div>
    <div class="col">
    <div class="card" >
    <img src="{{ asset('storage/perfil2.jpg') }}" class="card-img-top" alt="...">
  <div class="card-body">Richard Pinto Vargas - Ingeniero de Sistemas</p>
  </div>
</div>    </div>
    <div class="col">
    <div class="card">
  <img src="{{ asset('storage/perfil3.jpg') }}" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text">Angela Villalba - Mg en Educación</p>
  </div>
</div>    </div>
  </div>
</div>
        </div>
@endsection
