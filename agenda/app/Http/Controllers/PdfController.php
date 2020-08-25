<?php

namespace App\Http\Controllers;

use App\Contatos;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use PDF;


class PdfController extends Controller
{
    public function geraPdf(){

      $contatos = Contatos::all();
      $users = User::all();

      $pdf = PDF::loadView('pdf', compact('contatos', 'users'));
      return $pdf->setPaper('a4')->stream('com telefone.pdf');
      //return $pdf->download('relatorio1.pdf');

    }

    public function geraPdf2(){

        $nomes = array();

        $contatos = Contatos::all();
        $users = User::all();

        foreach($users as $user){
          if(!Contatos::where('user_id', '=', $user->id)->exists()){

            $nomes[] = [
              'name'=>$user->name
           ];
          
          }
        }
  
        $pdf = PDF::loadView('pdf2', compact('nomes'));
        return $pdf->setPaper('a4')->stream('sem telefone.pdf');
      
      }
}
