@extends('layouts.master')


@section('content')
<div class="container-fluid tareadiv">
<div class="cardstyle">
  <div class="cardstyle">
    <h1 class="cardstyle">Nombre: {{ $tarea->name }}</h1>
    <br>
    <p class="cardstyle">
     
		<h5>Descripcion: {{ $tarea->description }}</h5>
    <br>
		<h5>Fecha de entrega: {{ $tarea->due_date}}</h5>
    <br>
		<h5>Modalidad: {{$tarea->modality}}</h5>
    <br>
		<h5>Condicion: {{$tarea->status}}</h5>
    <br>
    </p>
   <a href="{{ route('tareas.index') }}"> <button type="button" class="btn btnregresar"><h5>Regresar</h5></button></a>
  </div>
</div>
</div>






@endsection