<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderByDesc('updated_at')->orderByDesc('created_at')->paginate(10);

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project = new Project();

        return view('admin.projects.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'title' => 'required|unique:projects|string|min:5|max:50',
                'language' => 'required|string',
                'framework' => 'nullable|string',
                'image' => 'nullable|url',
                'description' => 'nullable|string'
            ],
            [
                'title.required' => 'Il titolo è obbligatorio',
                'title.min' => 'Il titolo non può essere più corto di :min caratteri',
                'title.max' => 'Il titolo non può essere più lungo di :max caratteri',
                'title.unique' => 'Titolo già inserito, riprova con un altro titolo',
                'image.url' => 'L\'indirizzo inserito non è valido',
                'language.required' => 'Il linguaggio usato è obbligatorio',
            ]
        );

        $data = $request->all();

        $project = new Project();

        $project->fill($data);

        $project->save();

        return to_route('admin.projects.show', $project->id)->with('type', 'success')->with('message', 'Progetto aggiunto');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {

        $request->validate(
            [
                'title' => ['required', 'string', 'min:5', 'max:50', Rule::unique('projects')->ignore($project->id)],
                'language' => 'required|string',
                'framework' => 'nullable|string',
                'image' => 'nullable|url',
                'description' => 'nullable|string'
            ],
            [
                'title.required' => 'Il titolo è obbligatorio',
                'title.min' => 'Il titolo non può essere più corto di :min caratteri',
                'title.max' => 'Il titolo non può essere più lungo di :max caratteri',
                'title.unique' => 'Titolo già inserito, riprova con un altro titolo',
                'image.url' => 'L\'indirizzo inserito non è valido',
                'language.required' => 'Il linguaggio usato è obbligatorio',
            ]
        );


        $data = $request->all();

        $project->update($data);

        return to_route('admin.projects.show', $project->id)->with('type', 'success')->with('message', 'Progetto modificato');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return to_route('admin.projects.index')->with('type', 'danger')->with('message', 'Progetto eliminato con successo');
    }
}
