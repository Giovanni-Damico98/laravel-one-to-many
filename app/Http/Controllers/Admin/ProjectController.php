<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view("admin.projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validazione dei dati
        $request->validate([
            'name' => 'required|string|max:255',
            'type_id' => 'required|numeric',
            'date' => 'required|date',
            'languages' => 'nullable|string|max:255',
            'description' => 'required|string',
        ]);

        // Creazione di un nuovo progetto
        $project = new Project;
        $project->name = $request->input('name');
        $project->type_id = $request->input('type_id');
        $project->date = $request->input('date');
        $project->languages = $request->input('languages');
        $project->description = $request->input('description');
        $project->save();

        // Redirect con messaggio di successo
        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $projects = Project::findOrFail($id);
        $relatedProjects = Project::where('type_id', $projects->type_id)
            ->where('id', '!=', $projects->id) // Exclude the current project
            ->get();
        return view('admin.projects.show', compact("projects", 'relatedProjects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $types = Type::all();

        // Trova il progetto da modificare
        $project = Project::findOrFail($id);

        // Ritorna la vista di modifica con il progetto da modificare
        return view('admin.projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Trova il progetto da modificare
        $project = Project::findOrFail($id);

        // Validazione dei dati
        $request->validate([
            'name' => 'required|string|max:255',
            'type_id' => 'required|numeric',
            'date' => 'required|date',
            'languages' => 'nullable|string|max:255',
            'description' => 'required|string',
        ]);

        // Aggiorna i dati del progetto
        $project->name = $request->input('name');
        $project->type_id = $request->input('type_id');
        $project->date = $request->input('date');
        $project->languages = $request->input('languages');
        $project->description = $request->input('description');
        $project->save();

        // Redirect con messaggio di successo
        return redirect()->route('admin.projects.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Trova il progetto per ID
        $project = Project::findOrFail($id);

        // Elimina il progetto
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
