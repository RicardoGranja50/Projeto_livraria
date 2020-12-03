@extends('layout')
@section('titulo-pagina')
    Livraria
@endsection
@section('conteudo')
    <h2>Deseja eliminar o genero {{$genero->designacao}}?</h2>
    <form method="post" action="{{route('generos.destroy', ['idg'=>$genero->id_genero])}}">
        @csrf
        @method('delete')
        <input type="submit" value="enviar">
    </form>
@endsection