@extends('layout.site')

@section('titulo', 'Cursos')


@section('conteudo')

  <div class="container">
	  <h3 class="center">Lista de Cursos</h3>
  </div>
    <div class="row">
      @foreach ($cursos as $curso)
        <div class="col s12 m4">
          <div class="card medium">
            <div class="card-image">
              <img src="{{asset($curso->imagem)}}">
            </div>
            <div class="card-content">
              <h5>{{$curso->titulo}}</h5>
              <p>{{$curso->descricao}}</p>
            </div>
            <div class="card-action">
              <a href="#">Ver mais...</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <div class="row" align="center">
      {{$cursos->links()}}
    </div>


@endsection
