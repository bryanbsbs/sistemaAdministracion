<?php

namespace App\Http\Controllers;

use App\Models\Pay;
use Illuminate\Http\Request;

/**
 * Class PayController
 * @package App\Http\Controllers
 */
class PayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pays = Pay::paginate();

        return view('pay.index', compact('pays'))
            ->with('i', (request()->input('page', 1) - 1) * $pays->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pay = new Pay();
        return view('pay.create', compact('pay'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Pay::$rules);

        $pay = Pay::create($request->all());

        return redirect()->route('pays.index')
            ->with('success', 'Pay created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pay = Pay::find($id);

        return view('pay.show', compact('pay'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pay = Pay::find($id);

        return view('pay.edit', compact('pay'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Pay $pay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pay $pay)
    {
        request()->validate(Pay::$rules);

        $pay->update($request->all());

        return redirect()->route('pays.index')
            ->with('success', 'Pay updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pay = Pay::find($id)->delete();

        return redirect()->route('pays.index')
            ->with('success', 'Pay deleted successfully');
    }
}
