<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function registerUser(Request $request) {

        $user = new User();

        $validated = $request->validate([
            'email' => 'required|email:rfc',
            'password' => 'required|min:4',
            'role' => 'required'
        ],
        [
            'email.required'=>'Insira o email do usuário.',
            'email.email'=>'O formato de email não é válido',
            'password.required'=> 'Senha não informada.',
            'password.min'=> 'Tamanho insuficiente, insira uma senha com minímo 4 caracteres.',
            'role.required'=>'Insira a função do funcionário.'
        ]);

        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->role = $request->input('role');

        $user->save();
        return 'Success';
    }

    public function login(Request $request) {

        $validated = $request->validate([
            'email' => 'required|email:rfc',
            'password' => 'required|min:4',
            'role' => 'required'
        ],
        [
            'email.required'=>'Insira o email do usuário.',
            'email.email'=>'O formato de email não é válido',
            'password.required'=> 'Senha não informada.',
            'password.min'=> 'Tamanho insuficiente, insira uma senha com minímo 4 caracteres.',
            'role.required'=>'Insira a função do funcionário.'
        ]);

        $email = $request->input('email');
        $password = $request->input('password');
        $role = $request->input('role');

        $data = ['email'=>$email, 'password'=>$password, 'role'=>$role];

        $query = User::where($data)->first();

        if($query) {
            return 'Success';
        } else {
            return 'Fail';
        }
    }

}
