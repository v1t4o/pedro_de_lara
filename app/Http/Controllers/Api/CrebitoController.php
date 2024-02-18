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
      $ultimas_transacoes = $customer->transactions()->select('valor', 'tipo', 'descricao', 'realizada_em')
                                                     ->orderBy('realizada_em', 'desc')->limit(10)->get();

      $result = [
        "saldo" => [
          "total" => $customer->saldo,
          "data_extrato" => date('Y-m-d H:i:s'),
          "limite" => $customer->limite
        ],
        "ultimas_transacoes" => [$ultimas_transacoes]
      ];

      return response()->json($result);
    }

    public function createTransaction(Request $request, Customer $customer)
    {
      if ($request->input("tipo") == 'd' && $this->verifyLimit($customer, $request->input("valor"))) {
        return response('LimitError', 422)->header('Content-Type', 'text/json');;
      }

      $transaction = new Transaction;
      $transaction->customer_id = $customer->id;
      $transaction->valor = $request->input("valor");
      $transaction->tipo = $request->input("tipo");
      $transaction->descricao = $request->input("descricao");
      $transaction->realizada_em = date('Y-m-d H:i:s');

      $transaction->save();

      $result = $this->updateSaldo($customer, $request->input("valor"), $request->input("tipo"));

      return response()->json($result);
    }

    public function verifyLimit(Customer $customer, $valor) {
      if (($customer->saldo - $valor) > $customer->limite){
        return false;
      }
      return (($customer->saldo - $valor) * -1 > ($customer->limite));
    }

    public function updateSaldo(Customer $customer, $valor, $tipo) {
      switch ($tipo) {
        case 'd':
          $customer->saldo -= $valor;
          break;
        case 'c':
          $customer->saldo += $valor;
          break;
      }

      $customer->save();

      return [
        "limite" => $customer->limite,
        "saldo" => $customer->saldo
      ];
    }
}