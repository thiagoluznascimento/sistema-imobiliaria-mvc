<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cidade;  //está usando o BD

class CidadeController extends Controller
{
    public function cidades(){

        $subtitulo  = 'Cidades cadastradas';
        // $cidades = ['Recife', 'Belo Horizonte', 'Pirapora'];
        $cidades = Cidade::all(); //Cidade é o meu modelo. vai dá um  ''select * from'' na tabela

        // dd($cidades); //do laravel, serve para imprimir o que está armazenada nessa variavel
        // foreach($cidades as $cidade){
        //     echo $cidade->id;
        //     echo $cidade->nome;
        // }
       return view('admin.cidades.index', compact('subtitulo', 'cidades')); //estou passando essa variavel pra view cidades. usando a funcao compact do php.
    }

    public function formAdicionar()
    {
        return view('admin.cidades.form');
    }
    public function adicionar(Request $request) // requisição para o methodo
    {
        //pegando o dado enviado pelo form
        // $nome = $request->input('nome'); //nome que está no input lá no formulário (form.blade)
        // $nome = $request->nome; //msm coisa de cima
        // echo $nome;

        //Criar um objeto do modelo (classe) Cidade
        $cidade = new Cidade(); // essa classe que comunica com o BD
        $cidade->nome = $request->nome;

        $cidade->save(); //salva no BD

        return redirect()->route('admin.cidades.listar');
    }
}

//existem várias formas de passar dados do controller para view, nesse caso eu usei o compact do PHP.