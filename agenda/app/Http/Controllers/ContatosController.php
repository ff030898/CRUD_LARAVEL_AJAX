<?php

namespace App\Http\Controllers;

use App\Contatos;
use Illuminate\Http\Request;

class ContatosController extends Controller
{
    public function destroy($telefone){
        
         if(Contatos::where('tel', '=', $telefone)->exists()){

           $id = Contatos::where('tel', '=', $telefone)->get();
           $contato = Contatos::find($id[0]->id);
           $contato->delete();
         }
       
       
        if ($contato) {

            return response()->json([
                'message' => 'Telefone excluido com sucesso!',
                'class_name' => 'alert-success',
            ]);
        }
        return response()->json([
            'message' => "Erro",
            'class_name' => 'alert-danger',
        ]);
    }
}
