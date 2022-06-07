<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $projects = Project::get();

        return view('project.index', compact('projects'));
    }


    public function create()
    {
        $project = new Project();

        return view('project.create', compact('project'));
    }


    public function store(StoreProjectRequest $request)
    {
        $request->validated();
        $subtotal = $request->subtotal;
        $subtotal = doubleval($subtotal);
        $iva = $subtotal * 0.16;
        $total = $iva + $subtotal;

        Project::create($request->all() + ['iva' => $iva, 'total' => $total]);

        return redirect()->route('projects.index')
            ->with('success', 'Proyecto creado exitosamente.');
    }


    public function show(Project $project)
    {
        return view('project.show', [
            'project' => $project
        ]);
    }


    public function edit(Project $project)
    {
        return view('project.edit', [
            'project' => $project
        ]);
    }


    public function update(StoreProjectRequest $request, Project $project)
    {
        $request->validated();
        $project->update($request->all());

        return redirect()->route('projects.index')
            ->with('success', 'Proyecto actualizado correctamente.');
    }


    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')
            ->with('success', 'Proyecto borrado correctamente.');
    }
}
