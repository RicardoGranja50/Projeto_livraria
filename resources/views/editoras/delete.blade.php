@extends('layout')
@section('titulo-pagina')
    Livraria
@endsection
@section('conteudo')
    <h2>Deseja eliminar o editora {{$editora->nome}}?</h2>
    <form method="post" action="{{route('editoras.destroy', ['ide'=>$editora->id_editora])}}">
        @csrf
        @method('delete')
        <input type="submit" value="enviar">
    </form>
@endsection