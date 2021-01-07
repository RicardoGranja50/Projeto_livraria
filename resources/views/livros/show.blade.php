@extends('layout')
<ul>
ID:{{$livro->id_livro}}<br>
Titulo:{{$livro->titulo}}<br>
Idioma:{{$livro->idioma}}<br>
ISBN:{{$livro->isbn}}<br>
@if(!is_null($livro->data_edicao))
Data Edição:{{$livro->data_edicao->format('m-d-Y')}}<br>
@endif
Total paginas:{{$livro->total_paginas}}<br>
Observações:{{$livro->observacoes}}<br>

@if($livro->imagem_capa != NULL)
    Imagem Capa:<br>
    <img src="{{asset('imagens/livro/'.$livro->imagem_capa) }}"><br> 
@else
    Imagem Capa: inexistente<br>
@endif

@if($livro->exerto != NULL)
    Exerto:
    <a href="{{asset('documentos/livro/'.$livro->exerto) }}" target="_blank">PDF</a><br>
@else
    Exerto: inexistente<br>
@endif

@if(isset ($livro->user->name))
    Adicionado por: {{$livro->user->name}}<br>
@else
    <diV class="alert alert-danger" role="alert">
        Anonimo
    </div>
@endif


@if(count($livro->editoras)>0)
        @foreach($livro->editoras as $editora)
        Data Edição:{{$editora->nome}}<br>
        @endforeach
    @else
        <diV class="alert alert-danger" role="alert">
        Sem o nome do editora definido
        </div>
    @endif

    @if(isset ($livro->genero->designacao))
        Genero:{{$livro->genero->designacao}}<br>
    @else
        <diV class="alert alert-danger" role="alert">
        Sem género definido
        </div>
    @endif
    
    @if(count($livro->autores)>0)
        @foreach($livro->autores as $autor)
            Autor:{{$autor->nome}}<br>
        @endforeach
    @else
        <diV class="alert alert-danger" role="alert">
        Sem o nome do autor definido
        </div>
    @endif

Sinopse:{{$livro->sinopse}}<br>
Created_at:{{$livro->created_at}}<br>
Updated_at:{{$livro->updated_at}}<br>
Deleted_at:{{$livro->deleted_at}}<br>

<br>
@if(auth()->check())
    @if($utilizador==NULL) 
        <a href="{{route('livros.like',['id'=>$livro->id_livro])}}" class="btn btn-primary"> <i class="far fa-heart"></i></a>
            {{$likes}}
    @else
        <a href="{{route('livros.like',['id'=>$livro->id_livro])}}" class="btn btn-primary"> <i class="fas fa-heart"></i></a>
            {{$likes}}
    @endif
@endif

<br><BR>
@if($livro->id_user != NULL || Gate::allows('admin'))  
    @if(auth()->check())
        @if(auth()->user()->id == $livro->id_user || Gate::allows('admin'))
            <a href="{{route('livros.edit',['id'=>$livro->id_livro])}}" class="btn btn-primary">Editar Livro</a>

            <a href="{{route('livros.delete',['id'=>$livro->id_livro])}}" class="btn btn-primary">Eliminar Livro</a> 
        @endif
    @endif
@endif

</ul>