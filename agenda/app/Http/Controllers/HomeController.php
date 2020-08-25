<?php

namespace App\Http\Controllers;

use App\Contatos;
use App\User;
use Error;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function create(Request $req)
    {
        $dados = $req->all();

        $dados['password'] = bcrypt($dados['password']);
        $idUser = User::create($dados);

        $telefones = $req->fone;
        $data = array();

        foreach ($telefones as $telefone) {
            if (!empty($telefone)) {
                $data[] = [
                    'tel' => $telefone,
                    'user_id' => $idUser->id,
                ];

            }}

        $user = Contatos::insert($data);

        if ($user) {
            return redirect()->route('admin')->with('success', 'Sucesso ao cadastrar');
        }

        return redirect()->back()->with('error', 'Erro ao cadastrar Usuário');
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $cliente = User::findOrFail($id);

        $data = $request->all();

        $cliente->update($data);

        $telefones = $request->fone2;

        foreach ($telefones as $telefone) {

            if (!empty($telefone)) {

                try {

                    if (!Contatos::where('tel', '=', $telefone)->exists()) {

                        $contato = new Contatos();
                        $contato->tel = $telefone;
                        $contato->user_id = $cliente->id;
                        $contato->save();
                    }

                } catch (Error $e) {

                }

            }}

        if ($cliente) {

            return redirect()->route('admin')->with('success', 'Sucesso ao alterar usuário');
            //dd($request->all());

        }

        return redirect()->back()->with('error', 'Erro ao alterar Usuário');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        if ($user) {
            return redirect()->route('admin')->with('success', 'Excluido com sucesso!');
        }
        return redirect()->back()->with('error', 'Erro ao excluir usuário');
    }
}
