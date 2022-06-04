<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
    {
        $persons = Person::get();
        return view('person.index', compact('persons'));
    }


    public function create()
    {
        $person = new Person();
        return view('person.create', compact('person'));
    }


    public function store(Request $request)
    {
        request()->validate(Person::$rules);
        Person::create($request->all());
        return redirect()->route('persons.index')
            ->with('success', 'Persona añadida correctamente.');
    }


    public function show(Person $person)
    {
        return view('person.show', compact('person'));
    }


    public function edit($id)
    {
        $person = Person::find($id);
        return view('person.edit', compact('person'));
    }


    public function update(Request $request, Person $person)
    {
        request()->validate(Person::$rules);
        $person->update($request->all());
        return redirect()->route('persons.index')
            ->with('success', 'Persona actualizada correctamente.');
    }


    public function destroy($id)
    {
        Person::find($id)->delete();
        return redirect()->route('persons.index')
            ->with('success', 'Persona eliminada correctamente.');
    }
}
