<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Person;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::get();

        $temporalTable = DB::table('transactions')
        ->join('persons', 'persons.id', '=', 'transactions.person_id')
        ->join('projects','projects.id', '=', 'transactions.project_id')
        ->select('transactions.id', 'transactions.monto', 'transactions.fecha', 'transactions.metodo', 'persons.razonSocial', 'persons.tipo', 'projects.nombre')
        ->get();
        return view('transaction.index', ['temporalTable' => $temporalTable]);
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
        $project = Project::find($request->project_id);
        $person = Person::find($request->person_id);

        if($person->tipo == 'Cliente') {

            if(($project->progresoAnticipo + $transaction->monto) <= $project->total) {

                if(($project->progresoAnticipo + $transaction->monto) == $project->total) {
                    $project->progresoAnticipo += $transaction->monto;

                    if(($project->progresoAnticipo == $project->total)&&($project->progresoPago == $project->total)) {
                        $project->estado = 'Inactivo';
                    }

                    $project->save();
                    return redirect()->route('transactions.index')
                    ->with('success', 'Se ha terminado de pagar el proyecto.');
                }

                $project->progresoAnticipo += $transaction->monto;

            } else {
                return redirect()->route('transactions.index')
                    ->with('success', 'El pago que intenta hacer es mayor al precio total del proyecto');
            }

        } else {

            if(($project->progresoPago + $transaction->monto) <= $project->total) {

                if(($project->progresoPago + $transaction->monto) == $project->total) {
                    $project->progresoPago += $transaction->monto;

                    if(($project->progresoAnticipo == $project->total)&&($project->progresoPago == $project->total)) {
                        $project->estado = 'Inactivo';
                    }

                    $project->save();
                    return redirect()->route('transactions.index')
                    ->with('success', 'Con esta ultima transaccion se ha terminado de pagar al proveedor');
                }

                $project->progresoPago += $transaction->monto;

            } else {
                return redirect()->route('transactions.index')
                    ->with('success', 'El pago que intenta hacer es mayor al pago total del proveedor');
            }
        }

        $project->save();
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

        $oldMonto = $transaction->monto;
        $project = Project::find($request->project_id);
        $person = Person::find($request->person_id);

        if($person->tipo == 'Cliente') {

            $project->progresoAnticipo -= $oldMonto;
            $project->progresoAnticipo += $request->monto;

            if($project->progresoAnticipo <= $project->total){
                $project->estado = 'Activo';

                if(($project->progresoAnticipo == $project->total)&&($project->progresoPago == $project->total)) {
                    $project->estado = 'Inactivo';
                }

                $project->save();
                $transaction->update($request->all());
                return redirect()->route('transactions.index')
                ->with('success', 'Se ha terminado de pagar el proyecto.');
            }
            $project->save();

        } else {
            $project->progresoPago -= $oldMonto;
            $project->progresoPago += $request->monto;

            if($project->progresoPago <= $project->total) {
                $project->estado = 'Activo';

                if(($project->progresoPago == $project->total)&&($project->progresoAnticipo == $project->total)) {
                    $project->estado = 'Inactivo';
                }

                $project->save();
                $transaction->update($request->all());
                return redirect()->route('transactions.index')
                ->with('success', 'Se ha terminado de pagar el proyecto.');
            }
            $project->save();
        }

        $transaction->update($request->all());
        return redirect()->route('transactions.index')
            ->with('success', 'Transacción actualizada correctamente');
    }


    public function destroy($id)
    {
        $transaction = Transaction::find($id);
        $project = Project::find($transaction->project_id);
        $person = Person::find($transaction->person_id);

        if($person->tipo == 'Cliente') {
            $project->progresoAnticipo -= $transaction->monto;
        } else {
            $project->progresoPago -= $transaction->monto;
        }

        $project->estado = 'Activo';
        $project->save();
        $transaction->delete();
        return redirect()->route('transactions.index')
            ->with('success', 'Transacción eliminada correctamente');
    }
}
