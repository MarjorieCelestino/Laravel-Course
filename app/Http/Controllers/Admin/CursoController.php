<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Curso;

class CursoController extends Controller
{
    public function index(){
      $registros = Curso::all();
      return view('admin.cursos.index', compact('registros'));
    }

    public function adicionar(){
      return view('admin.cursos.adicionar');
    }

    public function salvar(Request $req){
      $dados = $req->all();
      //tratar checkbox
      if (isset($dados['publicado'])) {
        $dados['publicado'] = 'sim';
      }else{
        $dados['publicado'] = 'nao';
      }
      //tratar imagem
      if($req->hasFile('imagem')){
        $imagem = $req->file('imagem');
        $num = rand(1111, 9999);
        $dir = 'img/cursos/';
        $ex = $imagem->guessClientExtension();
        $nomeImagem = 'imagem_'.$num.'.'.$ex;
        $imagem->move($dir, $nomeImagem);
        $dados['imagem'] = $dir.'/'.$nomeImagem;

        //salvar dados
        Curso::create($dados);

        //Encaminhar usuário para listagem
        return redirect()->route('admin.cursos');
      }
    }

    public function editar($id){
      $registro = Curso::find($id);
      return view('admin.cursos.editar', compact('registro'));
    }

    public function atualizar(Request $req, $id){
      $dados = $req->all();
      //tratar checkbox
      if (isset($dados['publicado'])) {
        $dados['publicado'] = 'sim';
      }else{
        $dados['publicado'] = 'nao';
      }
      //tratar imagem
      if($req->hasFile('imagem')){
        $imagem = $req->file('imagem');
        $num = rand(1111, 9999);
        $dir = 'img/cursos/';
        $ex = $imagem->guessClientExtension();
        $nomeImagem = 'imagem_'.$num.'.'.$ex;
        $imagem->move($dir, $nomeImagem);
        $dados['imagem'] = $dir.'/'.$nomeImagem;

        //salvar dados
        Curso::find($id)->update($dados);

        //Encaminhar usuário para listagem
        return redirect()->route('admin.cursos');
      }
    }

    public function deletar($id){
      Curso::find($id)->delete();
      return redirect()->route('admin.cursos');
    }

}
