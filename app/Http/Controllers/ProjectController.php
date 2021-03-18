<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index()
    {
       $proyectos = Project::all();

       return view('projects.index')->with('proyectos', $proyectos);
    }


    public function create()
    {
        return view('projects.create');
    }


    public function store(Request $request)
    {
     
     $proyectos = Project::create([
            'name' => $request->name ,
            'description' => $request->description,
            'final_date' => $request->final_date,
            'hex' => $request->hex

        ]);

        return redirect()->back();
    }   
    

 
    public function show(Project $project)
    {
       $proyectos = Project::find($id);
        return view('projects.show') -> with('proyectos', $proyectos);  
    }

  
    public function edit(Project $project)
    {
       $proyectos = Project::find($id);

       return view ('project-edit')->with('proyectos', $proyectos);
    }

 
    public function update(Request $request, Project $project)
    {
     $proyectos =Project::find($id);
          $proyectos->update([
            'name' => $request->name ,
            'description' => $request->description,
            'final_date' => $request->final_date,
            'hex' => $request->hex,
            


        ]);


        if ($request->origen == 'edit') {
            redirect()->route('projects.show', $proyectos->id);
        }
        else{
            return redirect()->back();
        }
        //Regresar al usuario a show
       // return redirect()->route('projects.index', $proyectos->id);   
    }

   
    public function destroy(Project $project)
    {
        $proyectos = Project::find($id);

        $proyectos->delete();

        return redirect()->route('projects.index');
    }
}
