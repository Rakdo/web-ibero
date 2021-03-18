@extends('layouts.master')

@section('content')
<div class="container-fluid ">
	<div class="row">
		
		<div class="col-md-4  py-5 px-8">
			<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#CreateModal">
  				Crear nuevo Proyecto
				</button>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12	 py-4 px-5">
			<div class="card">
				<h5 class="card-header">Listado de Proyectos</h5>
				<div class="card-body">
					<h5 class="card-title">Proyectos en curso</h5>
					<p class="card-text">Este es tu listado principal de tareas, ponte a trabajar</p>
				</div>
			</div>
		</div>
	</div>
					
<div class="row">
		@foreach($proyectos as $proyecto)
		<div class="col-md-4">
			<div class="card">
				<div class="line-color" style="height: 5px; width: 100%; background-color: {{ $proyecto->hex }}"></div>
				<div class="card-body">
					<h4>{{ $proyecto->name }}</h4>
					<p>{{ $proyecto->description }}</p>
				</div>
				<div class="tareas">
					<ul>
						@foreach($proyecto->tareas as $tarea)
						<li>{{ $tarea->name }}</li>
						@endforeach
					</ul>

				</div>
				<button class="btn-primary btn btn-block" data-bs-toggle="modal" data-bs-target="#AddTaskModal_{{ $proyecto->id }}">Agregar Tarea</button>
			</div>

		</div>
 <!-- Edit Modal -->
<div class="modal fade" id="AddTaskModal_{{ $proyecto->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar tarea</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

     													 <div class="modal-body">
													 		<div class="container-fluid">
																<form method="POST" action="{{ route('tareas.store') }}">
															<!-- Nuestro campo de proteccion de formulario -->
															{{ csrf_field() }}
															

															<div class="form-group">
																<label>Nombre de tarea</label>
																<input class="form-control" type="text" name="name" placeholder="Nombre de tarea">

															</div>
															
															<div class="form-group">
																<label>Descripcion</label>
															<textarea class="form-control" name="description"></textarea>
															</div>

															<div class="form-group">
																		<label>Modalidad</label>
																		<select class="form-control" name="modality">
																			<option value="Individual">Individual</option>
																			<option value="Individual">Por equipo</option>
																			<option value="Individual">Ayuda exterior</option>
																		</select>
															</div>
																<div class="form-group">
																		<label>Proyectos</label>
																		<select class="form-control" name="project_id" disabled="true">
																		
																		<option value="{{ $proyecto->id }}" > {{ $proyecto->name }} </option>
																		
																		</select>
															</div>
															
															<div class="form-group">
																		<label>Fecha de entrega</label>
																		<input class="form-control" type="date" name="due_date">
															</div>


														</div>
													      </div>

															<!-- Guardar Formulario -->
															 <div class="modal-footer">
       														 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
															<button class="btn btn-success" type="submit">Guardar Tarea</button>
														</form>
													</div>
    </div>
  </div>
</div>
		@endforeach
</div> 
		
</div>
  
 </div>

	
<!-- Modal -->
<div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear nuevo Proyecto</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true">&times;</span>
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
															
															<div class="form-group">
																<label>Descripcion</label>
															<textarea class="form-control" name="description"></textarea>
															</div>

														
															
															<div class="form-group">
																		<label>Fecha de Final</label>
																		<input class="form-control" type="date" name="final_date">
															</div>

															<div class="form-group">
																		<label>Color de Proyecto</label>
																		<input class="form-control" type="color" name="hex">
															</div>

														</div>
													      </div>

															<!-- Guardar Formulario -->
															 <div class="modal-footer">
       														 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
															<button class="btn btn-success" type="submit">Guardar Proyecto</button>
														</form>
													</div>
														     
        
      </div>
    </div>
  </div>
</div>



	

	
	
@endsection