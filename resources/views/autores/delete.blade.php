@extends('layout')
@section('titulo-pagina')
    Livraria
@endsection
@section('conteudo')
    <h2>Deseja eliminar o autor {{$autor->nome}}?</h2>
    <form method="post" action="{{route('autores.destroy', ['ida'=>$autor->id_autor])}}">
        @csrf
        @method('delete')
        <input type="submit" value="enviar">
    </form>
@endsection