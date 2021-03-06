@extends('layout')
<ul>
IDG:{{$genero->id_genero}}<br>
Designacao:{{$genero->designacao}}<br>
Observações:{{$genero->observacoes}}<br>
    @if(count($genero->livros))
        <h5>Livros</h5><br>
        @foreach($genero->livros as $livro)
            <ul>
            <li>{{$livro->titulo}}<br></li>
            </ul>

        @endforeach
    @else  
        <div class="alert alert-danger" role="alert">
            Neste genero ainda não há livros!
        </div>
    @endif
Created_at:{{$genero->created_at}}<br>
Updated_at:{{$genero->updated_at}}<br>
Deleted_at:{{$genero->deleted_at}}<br>




@if(Gate::allows('admin'))
<a href="{{route('generos.edit',['idg'=>$genero->id_genero])}}" class="btn btn-primary">Editar Genero</a>
<a href="{{route('generos.delete',['idg'=>$genero->id_genero])}}" class="btn btn-primary">Eliminar Genero</a>
@endif
</ul>