@extends('layout')
@section('titulo-pagina')
Livraria
@endsection
@section('conteudo')
<form id="tobioas" method="post" action="{{route('pesquisa.form')}}">
    @csrf
<label for="pesquisa">Pesquisa</label>
<input type="text" name="pesquisa">
<button type="submit">Enviar</button>
</form>
<br><br>
@endsection