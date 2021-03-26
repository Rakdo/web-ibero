<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
  // Vista principal
  // Listado de tareas 

    //Como se ve cuando quieres hacer filtros
   // public function filtro(Request $request) {
     //   $proyectos = Project::where('user_id'), Auth::user()->id)->where('hex', $request->hex)->get();
    //}
    public function index()
    {
        // Collecion de Tareas
        $tareas = Task::where('user_id', Auth::user()->id)->get();
        $proyectos = Project::where('user_id', Auth::user()->id)->get();

        return view ('index')->with('tareas', $tareas)->with('proyectos',$proyectos);
    }

  
    public function create()
    {
       
      
    }

   
    public function store(Request $request)
    {
        $tarea = Task::create([
            'user_id'=> Auth::user()->id,
            'name' => $request->name ,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'modality' => $request->modality,
            'status' => 'Incompleto',
            'project_id' => $request->project_id,


        ]);
        return redirect()->back();
    }

    
    public function show($id)
    {
        $tarea = Task::where('id', $id)->where('user_id', Auth::user()->id)->first());

        if (empty($tarea)){
            return redirect()->back();
        } else {
            return view('show')->with('tarea',$tarea);
        }
        return view('show') -> with('tarea', $tarea);
    }

    public function edit($id)
    {
           $tarea = Task::find($id);

        
            if ($tarea->status =='Completa') {
                $tarea->status = 'Incompleto';
            
            }
            
            elseif ($tarea->status =='Incompleto') {
                $tarea->status = 'Completa';
            
            }
        
      
            
       
        
        $tarea->save();
        return redirect()->back();
    }

    
    public function update(Request $request, $id)
    {
        // Modo n00b
        /*
        $tarea =Task::find($id);

        $tarea->name = $request->name;
        $tarea->description = $request->description;
        $tarea->due_date = $request->due_date;

        $tarea->save();
        */

        $tarea =Task::find($id);
          $tarea->update([
            'name' => $request->name ,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'modality' => $request->modality,
            'status' => $tarea->status,
            'project_id' => $request->project_id,


        ]);



        //Regresar al usuario a show
        return redirect()->route('tareas.index', $tarea->id);
    }



   
    public function destroy($id)
    {
        $tarea = Task::find($id);

        $tarea->delete();

        return redirect()->route('tareas.index');
    }


}
