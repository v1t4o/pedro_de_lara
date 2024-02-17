<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Customer;
use App\Models\Docente;
use Illuminate\Http\Request;

class CrebitoController extends Controller
{
    public function extract(Request $request, Customer $customer)
    {
      // $customer = Customer::where('id','=', 1)->get();
      return response()->json($customer);
    }

    public function createTransaction(Request $request, Customer $customer)
    {
      $transaction = new Transaction;
      $transaction->customer_id = $customer->id;
      $transaction->valor = $request->input("valor");
      $transaction->tipo = $request->input("tipo");
      $transaction->descricao = $request->input("descricao");
      $transaction->realizada_em = date('Y-m-d H:i:s');

      $transaction->save();

      return response()->json($transaction);
    }

    public function updateSaldo($saldo, $limite, $valor) {
      $customer->update();
    }
}