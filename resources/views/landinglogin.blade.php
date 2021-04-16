@extends('layouts.master')

@section('content')

<div class="px-4 pt-5 my-5 text-center  landingdiv">
  <h1 class="display-4 fw-bold">App for tasks </h1>
  <div class="col-lg-6 mx-auto">
    <p class="lead mb-4">This is a school project in order to learn laravel and its uses, feel free to use it as you please :D</p>
  
  </div>
  <br>
  <br>
    <div class="row ">
 

 <div class="col-md-6  centercontent">
    <a href="{{route('proyectos.index') }}">
  <button class="btn  navbuttons">Proyectos</button>
  </a>
 </div>
  <div class="col-md-6  centercontent">
    <a href="{{route('tareas.index') }}">
  <button class="btn  navbuttons">Tareas</button>
  </a>
 </div>
 </div>
</div>
<br>
<br>

@endsection