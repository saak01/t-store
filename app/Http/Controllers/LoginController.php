<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

/**
 * Login Controller
 *
 * @author João Victor Costa <joaovictorcosta@sysout.com.br>
 * @since 15/05/2024
 * @version 1.0.0
 */
class LoginController extends Controller
{
    /**
     * Formulário de login
     *
     * @return void
     */
    function index(){
        return view('layouts.default_login');
    }

    /**
     * Validação de Login
     *
     * @param Request $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     * @return \Illuminate\Http\RedirectResponse
     */
    function login(Request $request){
        $credentials = $request->only('email','password');
        if ($this->validation($credentials)) {
            if(Auth::attempt($credentials)){
                $user = Auth::user();
                $request->session()->put('user', $user);
                return redirect()->intended('/admin/tshirts');
            }else{
                return back()->withErrors(['erro' => 'Credenciais incorretas']);
            }
        }
    }

    /**
     * Validatação form login
     *
     * @param [type] $credentials
     * @return void
     */
    function validation($credentials){
        $rules = [
            'email' => ['required', 'email', 'max:50','exists:users,email'],
            'password' => ['required','string']
        ];
        $validator = Validator::make($credentials,$rules);
        if(!$validator->fails()){
            return $validator;
        }else{
            return back()->withErrors(['']);
        }
    }
}
