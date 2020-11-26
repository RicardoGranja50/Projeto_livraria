@extends('layout')
@section('titulo-pagina')
Livraria
@endsection
@section('conteudo')

<form action="{{route('autores.store')}}" method="post">
    @csrf
    Nome autor: (<b style="color:red">*</b>)<input type="text" name="nome" value="{{old('nome')}}"><br><br>
    @if($errors->has('nome'))
        <b style="color:red">O nome do autor deve se encontrar entre 3 e 100 caracteres</b><br>
    @endif

    Nacionalidade: <input type="text" name="nacionalidade" value="{{old('nacionalidade')}}"><br><br>
    @if($errors->has('nacionalidade'))
        <b style="color:red">A nacionalidade do autor deve se encontrar entre 3 e 20 caracteres</b><br>
    @endif

    Data Nascimento: <input type="date" name="data_nascimento" value="{{old('data_nascimento')}}"><br><br>
    @if($errors->has('nacionalidade'))
        <b style="color:red">Insira uma data</b><br>
    @endif

    Fotografia: <input type="text" name="fotografia" value="{{old('fotografia')}}"><br><br>
    @if($errors->has('fotografia'))
        <b style="color:red">ERRO</b><br>
    @endif

    
    <input type="submit" value="enviar">
</form>

@endsection