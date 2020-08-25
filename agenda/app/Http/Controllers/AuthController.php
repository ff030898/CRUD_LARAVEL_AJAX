<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Contatos;

class AuthController extends Controller
{
    public function dashboard(){

        if(Auth::check() === true) {

            $registros = User::all();
            $telefones = Contatos::all();
            return view('home',compact('registros'), compact('telefones'));
        }
    
       
        return redirect()->route('home');
    }

    public function login(Request $request){

        $credentials = [

            'email' => $request['email'],
            'password' => $request['password'],
        ];

        if(Auth::attempt($credentials)) {
         
            return response()->json([
                'message' => 'Logado com sucesso',
                'login' => true,
            ]);      
        }

        return response()->json([
            'message' => 'Os dados informados não conferem',
            'login' => false,
        ]);
     
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home'); 

    }

    public function profile(){

        if(Auth::check() === true) {

            $id = Auth::user()->id;
            $user = User::find($id);
            return view('profile', compact('user'));
        }
    
        return redirect()->route('home');
    }
}
