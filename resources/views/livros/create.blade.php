@extends('layout')
@section('titulo-pagina')
Livraria
@endsection
@section('conteudo')

<h3 style="font-family:Noto Sans"> Adicionar Livro</h3><br>
<form action="{{route('livros.store')}}" method="post">
    @csrf
    Titulo: (<b style="color:red">*</b>)<input type="text" name="titulo" value="{{old('titulo')}}"><br><br>
    @if($errors->has('titulo'))
        <b style="color:red">O titulo deve ser entre 3 e 100 caracteres</b><br>
    @endif
    Idioma: (<b style="color:red">*</b>)<input type="text" name="idioma" value="{{old('idioma')}}"><br><br>
    @if($errors->has('idioma'))
        <b style="color:red">O idioma deve ser entre 3 e 20 caracteres</b><br>
    @endif
    Total paginas: <input type="text" name="total_paginas" value="{{old('total_paginas')}}"><br><br>
    @if($errors->has('total_paginas'))
        <b style="color:red">O Total de paginas deve ser maior ou igual a 1</b><br>
    @endif
    Data Edição: <input type="date" name="data_edicao" value="{{old('data_edicao')}}"><br><br>
    @if($errors->has('data_edicao'))
        <b style="color:red">Insira uma data</b><br>
    @endif
    ISBN: <input type="text" name="isbn" value="{{old('isbn')}}"><br><br>
    @if($errors->has('isbn'))
        <b style="color:red">Deverá indicar um ISBN correto (13 caracteres)</b><br>
    @endif
    Observações: <input type="text" name="observacoes" value="{{old('observacoes')}}"><br><br>
    @if($errors->has('observacoes'))
        <b style="color:red">Insira uma observação</b><br>
    @endif
    Imagem Capa: <input type="text" name="imagem_capa" value="{{old('imagem_capa')}}"><br><br>
    @if($errors->has('imagem_capa'))
        <b style="color:red">Erro</b><br>
    @endif
    <b>Generos</b>
    <select name="id_genero">
        @foreach($generos as $genero)
            <option value="{{$genero->id_genero}}">{{$genero->designacao}}</option>
        @endforeach
    </select>
    <br><br>
    @if($errors->has('id_genero'))
        <b style="color:red">Insira o id do genero</b><br>
    @endif
    Autor: <input type="text" name="id_autor" value="{{old('id_autor')}}"><br><br>
    @if($errors->has('id_autor'))
        <b style="color:red">Insira o id do autor</b><br>
    @endif
    Sinopse: <input type="text" name="sinopse" value="{{old('sinopse')}}"><br><br>
    @if($errors->has('sinopse'))
        <b style="color:red">Insira a sinopse do livro</b><br>
    @endif
    <input type="submit" value="enviar">
</form>
@endsection