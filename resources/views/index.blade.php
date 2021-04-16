@extends('layouts.master')

@section('content')
<div class="container-fluid tareadiv">
	<div class="row">
		<div class="col-md-8">
			<div class="title-page py-4 px-5">
		<h3 class="display-1"> Bienvenido Usuario</h3>
		<p class="lead ">Esta es una aplicacion de tareas, utilizala todos los dias</p>
		</div>
		</div>
		<div class="col-md-4  py-5 px-8">
			<!-- Button trigger modal -->
				<button type="button" class="btn  createbtn" data-bs-toggle="modal" data-bs-target="#CreateModal">
  				<h5>Crear nueva tarea</h5>
				</button>
		</div>
	</div>
	
	<div class="row">
		

		<div class="col-md-12	 py-4 px-5 centercontent">

			<div class="cardstyle">
				<div class="cardstyle">
					<h3 class="card-title">Tareas Pendientes</h3>
					<br>
					<h5 class="card-text">Este es tu listado principal de tareas, ponte a trabajar</h5>
					<br>
					<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tarea</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Fecha de entrega</th>
      <th scope="col">Modalidad</th>
      <th scope="col">Condición</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($tareas as $tarea)
    <tr>
      <th scope="row">{{$tarea->id}}</th>
      <td>{{$tarea->name}}</td>
      <td>{{$tarea->description}}</td>
      <td>{{$tarea->due_date}}</td>
      <td>{{$tarea->modality}}</td>
      <td>@if ($tarea->status == 'Incompleto')
      			<a href="{{ route('tareas.edit', $tarea->id) }}"><button type="button" class="btn btnincompleto" data-bs-toggle="modal"  > Pendiente </button></a>
      		@endif
      		@if ($tarea->status == 'Completa')
      			<a href="{{ route('tareas.edit', $tarea->id) }}"><button type="button" class="btn btnexito" data-bs-toggle="modal"  > Completada </button></a>
      		@endif</td>
      <td><div class="col-md-12"> <a href="{{route('tareas.show', $tarea->id) }}"><button type="button" class="btn btndetalle">Ver detalles</button></a>
      	<button type="button" class="btn btneditar" data-bs-toggle="modal" data-bs-target="#EditModal_{{ $tarea->id }}"> Editar Tarea </button>
      	<button type="button" class="btn btnborrar" data-bs-toggle="modal" data-bs-target="#DeleteModal_{{ $tarea->id }}"> Borrar Tarea </button>
      	
				</td>
				</div>
    </tr>
  </tbody>
</table>
</div>
</div>
			
			
			


		</div>
	</div>	
</div>

    <!-- Edit Modal -->
<div class="modal fade" id="EditModal_{{ $tarea->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content modaldiv">
      <div class="modal-header">
        <h2 class="modal-title centercontent" id="exampleModalLabel">Editar tarea</h2>
        <button type="button" class="btn btncerrar " data-bs-dismiss="modal"  style="text-align: right;">
          <ion-icon name="close-outline" style="transform: translate(0%, 10%);"></ion-icon>
        </button>
      </div>

     													 <div class="modal-body">
													 		<div class="container-fluid">
																<form method="POST" action="{{ route('tareas.update', $tarea->id) }}">
															<!-- Nuestro campo de proteccion de formulario -->
															{{ csrf_field() }}
															{{ method_field ('PUT') }}

															<!-- Campos del formulario -->
															<div class="form-group">
																<label>Nombre de tarea</label>
																<input class="form-control" type="text" name="name" placeholder="Nombre de tarea" value="{{ $tarea->name }}">

															</div>
															<br>
															<div class="form-group">
																<label>Descripcion</label>
															<textarea class="form-control" name="description"> {{ $tarea->description }}</textarea>
															</div>
															<br>
																<div class="form-group">
																		<label>Modalidad</label>
																		<select class="form-control" name="modality">
																			<option value="Individual">Individual</option>
																			<option value="Individual">Por equipo</option>
																			<option value="Individual">Ayuda exterior</option>
																		</select>
															</div>
															<br>
															<div class="form-group">
																		<label>Fecha de entrega</label>
																		<input class="form-control" type="date" name="due_date" value="{{ $tarea->due_date }}">
															</div>
															<br>

														</div>
													      </div>

															<!-- Guardar Formulario -->
															 <div class="modal-footer">
       														 <button type="button" class="btn btnincompleto centercontent"  data-bs-dismiss="modal">Close</button>
															<button class="btn btnexito centercontent" type="submit">Guardar Tarea</button>
														</form>
													</div>
    </div>
  </div>
</div>

<!-- Delete Modal -->
<<div class="modal fade" id="DeleteModal_{{ $tarea->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content modaldivborrar">
      <div class="modal-header">
        <h2 class="modal-title centercontent" id="exampleModalLabel">Estas seguro?</h2>
        <button type="button" class="btn btncerrar " data-bs-dismiss="modal"  style="text-align: right;">
          <ion-icon name="close-outline" style="transform: translate(0%, 10%);"></ion-icon>
        </button>
      </div>
      
       <form method="POST" action="{{route ('tareas.destroy', $tarea->id) }}">
		{{ csrf_field() }}
		{{method_field ('DELETE') }}
      <div class="modal-footer  centercontent">
        <button type="button" class="btn btnexito centercontent" data-bs-dismiss="modal">No</button>
       

<button type="submit" class="btn btnincompleto centercontent" >Si estoy seguro</button>
</form>
        
      </div>
    </div>
  </div>
</div>
    @endforeach
  

	
<!-- Modal -->
<div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content modaldiv">
      <div class="modal-header">
        <h2 class="modal-title centercontent" id="exampleModalLabel">Crear nueva tarea</h2>
        <button type="button" class="btn btncerrar " data-bs-dismiss="modal"  style="text-align: right;">
          <ion-icon name="close-outline" style="transform: translate(0%, 10%);"></ion-icon>
        </button>
      </div>
													      <div class="modal-body">
													 		<div class="container-fluid">
																<form method="POST" action="{{ route('tareas.store') }}">
															<!-- Nuestro campo de proteccion de formulario -->
															{{ csrf_field() }}

															<!-- Campos del formulario -->
															<div class="form-group">
																<label>Nombre de tarea</label>
																<input class="form-control" type="text" name="name" placeholder="Nombre de tarea">

															</div>
															<br>
															<div class="form-group">
																<label>Descripcion</label>
															<textarea class="form-control" name="description"></textarea>
															</div>
															<br>
															<div class="form-group">
																		<label>Modalidad</label>
																		<select class="form-control" name="modality">
																			<option value="Individual">Individual</option>
																			<option value="Individual">Por equipo</option>
																			<option value="Individual">Ayuda exterior</option>
																		</select>
															</div>
															<br>
																<div class="form-group">
																		<label>Proyectos</label>
																		<select class="form-control" name="project_id">
																		@foreach ($proyectos as $proyecto)
																		<option value="{{ $proyecto->id }}"> {{ $proyecto->name }} </option>
																		@endforeach
																		</select>
															</div>
															<br>
															<div class="form-group">
																		<label>Fecha de entrega</label>
																		<input class="form-control" type="date" name="due_date">
															</div>
															<br>
														</div>
													      </div>

															<!-- Guardar Formulario -->
															 <div class="modal-footer">
       														 <button type="button" class="btn btnincompleto centercontent"  data-bs-dismiss="modal">Close</button>
															<button class="btn btnexito centercontent" type="submit">Guardar Tarea</button>
														</form>
													</div>
														     
        
      </div>
    </div>
  </div>
</div>



	

	
	
@endsection