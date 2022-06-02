<?php

namespace App\Http\Controllers;

use App\Models\Advance;
use App\Models\Costumer;
use App\Models\Project;
use Illuminate\Http\Request;

/**
 * Class AdvanceController
 * @package App\Http\Controllers
 */
class AdvanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advances = Advance::paginate();

        return view('advance.index', compact('advances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $costumers = Costumer::all();
        $projects = Project::all();
        $advance = new Advance();
        return view('advance.create', [ 'advance' => $advance,
                                        'projects' => $projects,
                                        'costumers' => $costumers ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Advance::$rules);

        $advance = Advance::create($request->all());

        return redirect()->route('advances.index')
            ->with('success', 'Advance created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $advance = Advance::find($id);

        return view('advance.show', compact('advance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $costumers = Costumer::all();
        $projects = Project::all();
        $advance = Advance::find($id);
        return view('advance.edit', ['advance' => $advance,
                                     'projects' => $projects,
                                     'costumers' => $costumers ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Advance $advance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advance $advance)
    {
        request()->validate(Advance::$rules);

        $advance->update($request->all());

        return redirect()->route('advances.index')
            ->with('success', 'Advance updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $advance = Advance::find($id)->delete();

        return redirect()->route('advances.index')
            ->with('success', 'Advance deleted successfully');
    }
}
