<form action="{{route('livros.store')}}" method="post">
    @csrf
    Titulo: <input tupe="text" name="titulo"><br><br>
    Idioma: <input tupe="text" name="idioma"><br><br>
    Total paginas: <input tupe="text" name="total_paginas"><br><br>
    Data Edição: <input tupe="text" name="data_edicao"><br><br>
    ISBN: <input tupe="text" name="isbn"><br><br>
    Observações: <input tupe="text" name="observacoes"><br><br>
    Imagem Capa: <input tupe="text" name="imagem_capa"><br><br>
    Genero: <input tupe="text" name="id_genero"><br><br>
    Autor: <input tupe="text" name="id_autor"><br><br>
    Sinopse: <input tupe="text" name="sinopse"><br><br>
    <input type="submit" value="enviar">
</form>