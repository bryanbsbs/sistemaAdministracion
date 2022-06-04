<?php

namespace App\Http\Controllers;

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


    public function store(Request $request)
    {
        request()->validate(Project::$rules);
        $subtotal = request()->subtotal;
        $subtotal = doubleval($subtotal);
        $iva = $subtotal * 0.16;
        $total = $iva + $subtotal;
        Project::create($request->all() + ['iva' => $iva, 'total' => $total]);
        return redirect()->route('projects.index')
            ->with('success', 'Proyecto creado exitosamente.');
    }


    public function show($id)
    {
        $project = Project::find($id);
        return view('project.show', compact('project'));
    }


    public function edit($id)
    {
        $project = Project::find($id);
        return view('project.edit', compact('project'));
    }


    public function update(Request $request, Project $project)
    {
        request()->validate(Project::$rules);
        $project->update($request->all());
        return redirect()->route('projects.index')
            ->with('success', 'Proyecto actualizado correctamente.');
    }


    public function destroy($id)
    {
        Project::find($id)->delete();
        return redirect()->route('projects.index')
            ->with('success', 'Proyecto borrado correctamente.');
    }
}
