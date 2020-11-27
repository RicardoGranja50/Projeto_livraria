@extends('layout')
@section('titulo-pagina')
Livraria
@endsection
@section('conteudo')

<form action="{{route('autores.update', ['ida'=>$autor->id_autor])}}" method="post">
    @csrf
    @method('patch')
    
    <h3 style="font-family:Noto Sans"> Editar Autor</h3><br>
    Nome autor: (<b style="color:red">*</b>)<input type="text" name="nome" value="{{$autor->nome}}"><br><br>
    @if($errors->has('nome'))
        <b style="color:red">O nome do autor deve se encontrar entre 3 e 100 caracteres</b><br>
    @endif

    Nacionalidade: <input type="text" name="nacionalidade" value="{{$autor->nacionalidade}}"><br><br>
    @if($errors->has('nacionalidade'))
        <b style="color:red">A nacionalidade do autor deve se encontrar entre 3 e 20 caracteres</b><br>
    @endif

    Data Nascimento: <input type="date" name="data_nascimento" value="{{$autor->data_nascimento}}"><br><br>
    @if($errors->has('nacionalidade'))
        <b style="color:red">Insira uma data</b><br>
    @endif

    Fotografia: <input type="text" name="fotografia" value="{{$autor->fotografia}}"><br><br>
    @if($errors->has('fotografia'))
        <b style="color:red">ERRO</b><br>
    @endif

    
    <input type="submit" value="enviar">
</form>

@endsection