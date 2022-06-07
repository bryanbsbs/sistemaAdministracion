<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonRequest;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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


    public function store(StorePersonRequest $request)
    {
        Person::create($request->validated());

        return redirect()->route('persons.index')
            ->with('success', 'Persona añadida correctamente.');
    }


    public function show(Person $person)
    {
        return view('person.show', compact('person'));
    }


    public function edit(Person $person)
    {
        return view('person.edit', compact('person'));
    }


    public function update(StorePersonRequest $request, Person $person)
    {
        $person->update($request->validated());

        return redirect()->route('persons.index')
            ->with('success', 'Persona actualizada correctamente.');
    }


    public function destroy(Person $person)
    {
        $person->delete();

        return redirect()->route('persons.index')
            ->with('success', 'Persona eliminada correctamente.');
    }
}
