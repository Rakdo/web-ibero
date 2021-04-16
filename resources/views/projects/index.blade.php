@extends('layouts.master')

@section('content')
<div class="container-fluid projectdiv">
	<div class="row">
		<div class="col-md-7 centercontent py-5 px-8">
			<!-- Button trigger modal -->
			<h1>Listado de proyectos</h1>
		</div>
		<div class="col-md-5 centercontent py-5 px-8">
			<!-- Button trigger modal -->
			
				<button type="button" class="btn createbtn" data-bs-toggle="modal" data-bs-target="#CreateModal">
  				<h3>Crear nuevo Proyecto</h3>
				</button>
		</div>
	</div>
	<center><hr width=80% ></center>
	<div class="row">
		<div class="col-md-12	 py-4 px-5">
			<div class="cardstyle">
				
				<div class="card-body">
					<h3 class="card-title">Proyectos en curso</h3>
					
				</div>
				<center><hr width=20% ></center>
				
			</div>
		</div>
	</div>
					
<div class="row">
		@foreach($proyectos as $proyecto)
		<div class="col-md-4" style="border-radius: 5px;">
			<div class="projectcard" style="border-radius: 5px;">
				<div class="line-color" style="height: 5px; width: 100%; background-color: {{ $proyecto->hex }}"></div>
				<div class="card-body centercontent">
					<br>
					<h3>{{ $proyecto->name }}</h3>
					<center><hr width=20%></center>
					<p>{{ $proyecto->description }}</p>
					<center><hr width=5%></center>
				</div>
				<div class="tareas centercontent" style="">
					
						@foreach($proyecto->tareas as $tarea)
						<ion-icon name="caret-forward-outline"></ion-icon> {{ $tarea->name }}
						@endforeach
					
					<br>
					<br>
				</div>
				<center><button class="btnagregartarea btn btn-block"  data-bs-toggle="modal" data-bs-target="#AddTaskModal_{{ $proyecto->id }}">Agregar Tarea</button></center>
				<br>
			</div>

		</div>
		</div> 
		
</div>
  
 </div>
 <!-- Edit Modal -->
<div class="modal fade" id="AddTaskModal_{{ $proyecto->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
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
		@endforeach


	
<!-- Modal -->
<div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content modaldiv">
       <div class="modal-header">
        <h2 class="modal-title centercontent" id="exampleModalLabel">Crear nuevo proyecto</h2>
        <button type="button" class="btn btncerrar " data-bs-dismiss="modal"  style="text-align: right;">
          <ion-icon name="close-outline" style="transform: translate(0%, 10%);"></ion-icon>
        </button>
      </div>
													      <div class="modal-body">
													 		<div class="container-fluid">
																<form method="POST" action="{{ route('proyectos.store') }}">
															<!-- Nuestro campo de proteccion de formulario -->
															{{ csrf_field() }}

															<!-- Campos del formulario -->
															<div class="form-group">
																<label>Nombre de proyecto</label>
																<input class="form-control" type="text" name="name" placeholder="Nombre de proyecto">

															</div>
															<br>
															<div class="form-group">
																<label>Descripcion</label>
															<textarea class="form-control" name="description"></textarea>
															</div>

															<br>
															
															<div class="form-group">
																		<label>Fecha de Final</label>
																		<input class="form-control" type="date" name="final_date">
															</div>
															<br>
															<div class="form-group">
																		<label>Color de Proyecto</label>
																		<input class="form-control" type="color" name="hex">
															</div>
															<br>
														</div>
													      </div>

															<!-- Guardar Formulario -->
															 <div class="modal-footer">
       														 <button type="button" class="btn btnincompleto centercontent" data-bs-dismiss="modal">Close</button>
															<button class="btn btnexito centercontent" type="submit">Guardar Proyecto</button>
														</form>
													</div>
														     
        
      </div>
    </div>
  </div>
</div>



	

	
	
@endsection