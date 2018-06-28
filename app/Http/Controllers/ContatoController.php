<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contato;

class ContatoController extends Controller
{
    public function index(){

    	$contatos = [
    		(object) ['nome'=>'Maria', 'tel'=>'984872897'],
    		(object) ['nome'=>'João', 'tel'=>'30885863']
    	];

        $contato = new Contato();
        $conn = $contato->lista();
        dd($conn->nome);

    	//onde está a view, array de dados(opcional)
    	return view('contato.index', compact('contatos'));
    }

    public function criar(Request $req){
    	$nome = dd($req['Nome']);
    	return "Esse é o criar do ContatoController Nome = ". $nome;
    }

    public function editar(){
    	return "Esse é o editar do ContatoController";
    }
}
