<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function registerCustomer(Request $request) {

        $customer = new Customer();

        $validated = $request->validate([
            'name' => 'required',
            'CPF' => 'required|unique:customers'
        ],
        [
            'CPF.required'=>'O CPF é obrigatório.',
            'CPF.unique'=>'Chave CPF já cadastrada, insira uma nova'
        ]);

        $customer->name = $request->input('name');
        $customer->CPF = $request->input('CPF');

        $customer->save();

        return "Success";
    }
}
