@extends('layout')
@section('titulo-pagina')
Livraria
@endsection
@section('conteudo')
<ul>
{{$autores->render()}}
@foreach($autores as $autor)
<li>
<a href="{{route('autores.show', ['ida'=>$autor->id_autor])}}">
    {{$autor->nome}}
</a></li>
@endforeach
</ul>
@if(Gate::allows('admin'))
<a href="{{route('autores.create')}}" class="btn btn-primary">Adicionar Autor</a>
@endif
@endsection