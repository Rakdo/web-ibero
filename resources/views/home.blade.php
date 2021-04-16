@extends('layouts.master')

@section('content')
<div class="container landingdiv">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="cardstyle">
                <div class=""><h1>{{ __('Dashboard') }}</h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                           <h3> {{ session('status') }}</h3>
                        </div>
                    @endif

                   <h3> {{ __('You are logged in!') }}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row ">
 
 <div class="col-md-4  centercontent">
    <a href="/logged">
  <button class="btn  navbuttons" >Overview</button>
  </a>
 </div>
 <div class="col-md-4  centercontent">
    <a href="{{route('proyectos.index') }}">
  <button class="btn  navbuttons">Proyectos</button>
  </a>
 </div>
  <div class="col-md-4  centercontent">
    <a href="{{route('tareas.index') }}">
  <button class="btn  navbuttons">Tareas</button>
  </a>
 </div>
 </div>
</div>
@endsection
