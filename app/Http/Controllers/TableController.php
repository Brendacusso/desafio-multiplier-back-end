<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;

class TableController extends Controller
{
    public function registerTable(Request $request) {

        $table_num = new Table();

        $validated = $request->validate([
            'table_number' => 'required|numeric|unique:tables',
        ],
        [
            'table_number.required'=>'Número da mesa não informado.',
            'table_number.numeric'=> 'O valor informado não corresponde ao formato de número',
            'table_number.unique'=>'Número da mesa já existente, insira um novo valor'
        ]);

        $table_num->table_number = $request->input('table_number');

        $table_num->save();
        return 'Success';
    }
}
