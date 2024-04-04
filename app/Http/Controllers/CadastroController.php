<?php

namespace App\Http\Controllers;

use App\Models\Cadastro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CadastroController extends Controller
{

    public function index(){
        $cadastros = Cadastro::all();

        $cadastrosComImagem = $cadastros->map(function($cadastro){
            return [
                'nome' => $cadastro->nome,
                'telefone' => $cadastro->telefone,
                'endereco' => $cadastro->endereco,
                'email' => $cadastro->email,
                'password' => Hash::make($cadastro->password),
                'imagem' => asset('storage/'. $cadastro->imagem),
            ];
        });
        return response()->json($cadastrosComImagem);
    }

    public function store(Request $request){
        $cadastroData = $request->all();

        if($request->hasFile('imagem')){
            $imagem = $request->file('imagem');
            $nomeImagem = time().'.'.$imagem->getClientOriginalExtension();
            $caminhoImagem= $imagem->storeAs('imagens/cadastros', $nomeImagem,'public');
            $cadastroData['imagem']= $caminhoImagem;
        }
        $cadastro = cadastro::create($cadastroData);
        return response()->json(['cadastro'=>$cadastro], 201);
    }

}

