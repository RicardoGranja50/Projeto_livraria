@extends('layout')
@section('titulo-pagina')
    Livraria
@endsection
@section('conteudo')
    <h2>Deseja eliminar o livro {{$livro->titulo}}?</h2>
    <form method="post" action="{{route('livros.destroy', ['id'=>$livro->id_livro])}}">
        @csrf
        @method('delete')
        <input type="submit" value="enviar">
    </form>
@endsection