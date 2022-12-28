<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function registerMenu(Request $request) {
        $menu = new Menu();

        $validated = $request->validate([
            'name' => 'required'
        ],
        [
            'name.required'=>'Insira o nome do item do cardápio.'
        ]);

        $menu->name = $request->input('name');

        $menu->save();
        return 'Success';
    }
}
