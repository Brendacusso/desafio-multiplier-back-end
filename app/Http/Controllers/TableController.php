<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;

class TableController extends Controller
{
    public function registerTable(Request $request) {

        $table_num = new Table();

        $validated = $request->validate([
            'description' => 'required',
        ],
        [
            'description.required'=>'Dscrição da mesa não informado.'
        ]);

        $table_num->description = $request->input('description');

        $table_num->save();
        return 'Success Id da mesa: '.$table_num->id;
    }
}
