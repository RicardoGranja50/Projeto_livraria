@extends('layout')
@section('titulo-pagina')
Livraria
@endsection
@section('conteudo')

<form action="{{route('editoras.store')}}" method="post">
    @csrf
    Nome editora: (<b style="color:red">*</b>)<input type="text" name="nome" value="{{old('nome')}}"><br><br>
    @if($errors->has('nome'))
        <b style="color:red">O nome da editora deve se encontrar entre 3 e 100 caracteres</b><br>
    @endif

    Morada: <input type="text" name="morada" value="{{old('morada')}}"><br><br>
    @if($errors->has('morada'))
        <b style="color:red">A morada da Editora deve se encontrar entre 3 e 255 caracteres</b><br>
    @endif

    Observações: <input type="text" name="observacoes" value="{{old('observacoes')}}"><br><br>
    @if($errors->has('observacoes'))
        <b style="color:red">Insira uma observação (entre 3 e 255 caracteres)</b><br>
    @endif

   

    
    <input type="submit" value="enviar">
</form>

@endsection