@extends('layout')
@section('titulo-pagina')
Livraria
@endsection
@section('conteudo')

<h3 style="font-family:Noto Sans"> Editar Genero</h3><br>
<form action="{{route('generos.update', ['idg'=>$genero->id_genero])}}" method="post">
    @csrf
    @method('patch')
    
    Designação: (<b style="color:red">*</b>)<input type="text" name="designacao" value="{{$genero->designacao}}"><br><br>
    @if($errors->has('designacao'))
        <b style="color:red">A designação do genero deve se encontrar entre 3 e 30 caracteres</b><br>
    @endif

    Observção: <input type="text" name="observacoes" value="{{$genero->observacoes}}"><br><br>
    @if($errors->has('observacoes'))
        <b style="color:red">Insira uma observação entre 3 e 255 caracteres</b><br>
    @endif
  
    <input type="submit" value="enviar">
</form>

@endsection