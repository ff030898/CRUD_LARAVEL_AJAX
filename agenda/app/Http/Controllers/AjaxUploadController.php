<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Contatos;
use App\User;
use Illuminate\Support\Facades\Auth;

class AjaxUploadController extends Controller
{
   
    function action(Request $request, $id)
    {

     $cliente = User::findOrFail($id);

     $data = $request->all();   

     $validation = Validator::make($request->all(), [
      'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
     ]);

     if(!$validation->fails())
     {
      $image = $request->file('avatar');
      $new_name = rand() . '.' . $image->getClientOriginalExtension();
      $image->move(public_path('img/usuarios'), $new_name);
      $data['avatar'] = 'img/usuarios/'.$new_name;
      $cliente->update($data);

      return response()->json([
       'message'   => 'Upload realizado com sucesso!',
       'uploaded_image' => '<img id="blah" src="'.$data['avatar'].'" class="img-thumbnail" width="300">',
       'img_profile' => '<img src="'.$data['avatar'].'" id="user_profile" alt="">'.Auth::user()->name.'<span class=" fa fa-angle-down"></span>',
       'class_name'  => 'alert-success'
      ]);

     }
     else
     {
      return response()->json([
       'message'   => 'O avatar deve ser uma imagem ou seja um arquivo do tipo: jpeg, png, jpg, gif.',
       'uploaded_image' => '',
       'class_name'  => 'alert-danger'
      ]);
     }
    }
}
?>
