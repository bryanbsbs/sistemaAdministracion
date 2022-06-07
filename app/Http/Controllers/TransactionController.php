<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Models\Transaction;
use App\Models\Person;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:transactions.index')->only('index');
        $this->middleware('can:transactions.create')->only('create', 'store');
        $this->middleware('can:transactions.edit')->only('edit', 'update');
        $this->middleware('can:transactions.show')->only('show');
        $this->middleware('can:transactions.destroy')->only('destroy');
    }

    public function index()
    {
        $temporalTable = DB::table('transactions')
        ->join('persons', 'persons.id', '=', 'transactions.person_id')
        ->join('projects','projects.id', '=', 'transactions.project_id')
        ->select('transactions.id', 'transactions.monto', 'transactions.fecha', 'transactions.metodo', 'persons.razonSocial', 'persons.tipo', 'projects.nombre')
        ->where('transactions.deleted_at', NULL)
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


    public function store(StoreTransactionRequest $request)
    {
        $transaction = $request->validated();
        $project = Project::find($request->project_id);
        $person = Person::find($request->person_id);

        if($request->monto <= 0) {
            return redirect()->route('transactions.index')
            ->with('success', 'No hagas eso');
        }

        if($person->tipo == 'Cliente') {//CLIENTE

            if(($project->progresoAnticipo + $transaction['monto']) <= $project->total) {//PROGRESO + MONTO < TOTAL
                $project->progresoAnticipo += $transaction['monto'];

                if($project->progresoAnticipo == $project->total) {//PROGRESO + MONTO == TOTAL

                    if(($project->progresoAnticipo == $project->total)&&($project->progresoPago == $project->total)) {//AMBOS PROGRESOS IGUALES AL TOTAL
                        $project->estado = 'Inactivo';
                    }

                    $project->save();
                    Transaction::create($transaction);

                    return redirect()->route('transactions.index')
                    ->with('success', 'Se ha terminado de pagar el proyecto.');
                }

            } else {//PROGRESO + MONTO > TOTAL
                return redirect()->route('transactions.index')
                    ->with('success', 'No puede hacer un cargo mayor al precio del proyecto.');
            }

        } else {//PROVEEDOR

            if(($project->progresoPago + $transaction['monto']) <= $project->total) {
                $project->progresoPago += $transaction['monto'];

                if($project->progresoPago == $project->total) {

                    if(($project->progresoAnticipo == $project->total)&&($project->progresoPago == $project->total)) {
                        $project->estado = 'Inactivo';
                    }

                    $project->save();
                    Transaction::create($transaction);

                    return redirect()->route('transactions.index')
                        ->with('success', 'Con esta ultima transaccion se ha terminado de pagar al proveedor');
                }

            } else {
                return redirect()->route('transactions.index')
                    ->with('success', 'El pago que intenta hacer es mayor al pago total del proveedor');
            }
        }

        $project->save();
        Transaction::create($transaction);

        return redirect()->route('transactions.index')
            ->with('success', 'Transaccion creada correctamente.');
    }


    public function show(Transaction $transaction)
    {
        $person = Person::find($transaction->person_id);
        $project = Project::find($transaction->project_id);

        return view('transaction.show', ['transaction' => $transaction, 'person' => $person, 'project' => $project]);
    }


    public function edit(Transaction $transaction)
    {
        $persons = Person::all();
        $projects = Project::all();
        return view('transaction.edit', ['transaction' => $transaction,
                                'projects' => $projects,
                                'persons' => $persons ]);
    }


    public function update(StoreTransactionRequest $request, Transaction $transaction)
    {
        $request->validated();
        $anteriorMonto = $transaction->monto;
        $project = Project::find($request->project_id);
        $person = Person::find($request->person_id);

        if($request->monto <= 0) {
            return redirect()->route('transactions.index')
            ->with('success', 'No hagas eso');
        }

        if($person->tipo == 'Cliente') {

            $project->progresoAnticipo -= $anteriorMonto;
            $project->progresoAnticipo += $request->monto;

            if($project->progresoAnticipo <= $project->total){
                $project->estado = 'Activo';

                if(($project->progresoAnticipo == $project->total)&&($project->progresoPago == $project->total)) {
                    $project->estado = 'Inactivo';
                }

            } else {
                return redirect()->route('transactions.index')
                ->with('success', 'El pago supera al precio total del proyecto.');
            }

        } else {
            $project->progresoPago -= $anteriorMonto;
            $project->progresoPago += $request->monto;

            if($project->progresoPago <= $project->total) {
                $project->estado = 'Activo';

                if(($project->progresoPago == $project->total)&&($project->progresoAnticipo == $project->total)) {
                    $project->estado = 'Inactivo';
                }

            } else {
                return redirect()->route('transactions.index')
                ->with('success', 'El pago supera al pago total del proveedor.');
            }
        }

        $project->save();
        $transaction->update($request->all());

        return redirect()->route('transactions.index')
            ->with('success', 'Transacción actualizada correctamente');
    }


    public function destroy(Transaction $transaction)
    {
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
