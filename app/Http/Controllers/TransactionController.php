<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Person;
use App\Models\Project;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::get();
        return view('transaction.index', compact('transactions'));
    }


    public function create()
    {
        $persons = Person::all();
        $projects = Project::all();
        $transaction = new Transaction();
        return view('transaction.create', [ 'transaction' => $transaction,
                                    'projects' => $projects,
                                    'persons' => $persons ]);
    }


    public function store(Request $request)
    {
        request()->validate(Transaction::$rules);
        $transaction = Transaction::create($request->all());
        return redirect()->route('transactions.index')
            ->with('success', 'Transaccion creada correctamente.');
    }


    public function show($id)
    {
        $transaction = Transaction::find($id);
        $person = Person::find($transaction->person_id);
        $project = Project::find($transaction->project_id);
        return view('transaction.show', ['transaction' => $transaction, 'person' => $person, 'project' => $project]);
    }


    public function edit($id)
    {
        $persons = Person::all();
        $projects = Project::all();
        $transaction = Transaction::find($id);
        return view('transaction.edit', ['transaction' => $transaction,
                                'projects' => $projects,
                                'persons' => $persons ]);
    }


    public function update(Request $request, Transaction $transaction)
    {
        request()->validate(Transaction::$rules);
        $transaction->update($request->all());
        return redirect()->route('transactions.index')
            ->with('success', 'Transacción actualizada correctamente');
    }


    public function destroy($id)
    {
        Transaction::find($id)->delete();
        return redirect()->route('transactions.index')
            ->with('success', 'Transacción eliminada correctamente');
    }
}
