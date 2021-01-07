<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;
use App\Models\Genero;
use App\Models\Autor;
use App\Models\Editora;
use App\Models\Like;
use Illuminate\Support\Facades\Gate;
use Auth;

class LivrosController extends Controller
{
    //
    public function index(){
        //$livros = Livro::all()->sortbydesc('idl');
        $livros= Livro::paginate(4);
        return view('livros.index',[
            'livros'=>$livros
        ]);
    }
    public function show(Request $request){
        $utilizador="";
        $idLivro = $request->id;
        
        //$livro=Livro::findOrFail($idLivro);
        //$livro=Livro::find($idLivro);
        if(Auth::check()){
            $userAtual=Auth::user()->id;
            $utilizador=Like::where('id_user', $userAtual)->where('id_livro', $idLivro)->first();
        }
        $likes=Like::where('id_livro', $idLivro)->count();
        $livro=Livro::where('id_livro',$idLivro)->with(['genero','autores','editoras','user'])->first();
        return view('livros.show',[
            'livro'=>$livro,
            'likes'=>$likes,
            'utilizador'=>$utilizador,
        ]);
    }

    public function create(){

        $generos=Genero::all();
        $autores=Autor::all();
        $editoras=Editora::all();
        return view('livros.create',[
            'generos'=>$generos,
            'autores'=>$autores,
            'editoras'=>$editoras,
        ]);
    }

    public function store(Request $req){
                $novoLivro=$req->validate([
                    'titulo'=>['required','min:3','max:100'],
                    'idioma'=>['required','min:3','max:10'],
                    'total_paginas'=>['nullable','numeric','min:1'],
                    'data_edicao'=>['nullable','date'],
                    'isbn'=>['nullable','min:13','max:13'],
                    'observacoes'=>['nullable','min:3','max:1000'],
                    'imagem_capa'=>['image','nullable','max:2000'],
                    'id_genero'=>['nullable','numeric'],
                    'sinopse'=>['nullable','min:3','max:255']
                ]);

                if($req->hasFile('imagem_capa')){
                    $nomeImagem=$req->file('imagem_capa')->getClientOriginalName();

                    $nomeImagem=time().'_'.$nomeImagem;
                    $guardarImagem=$req->file('imagem_capa')->storeAs('imagens/livro',$nomeImagem);

                    $novoLivro['imagem_capa']=$nomeImagem;
                }

                if(Auth::check()){
                    $userAtual=Auth::user()->id;
                    $novoLivro['id_user']=$userAtual;
                }

                $autores=$req->id_autor;
                $editoras=$req->id_editora;

                $livro=Livro::create($novoLivro);
                $livro->autores()->attach($autores);
                $livro->editoras()->attach($editoras);
                
                return redirect()->route('livros.show',[
                    'id'=>$livro->id_livro
                ]);
            
    }

    public function edit(Request $req){

        $generos=Genero::all();
        $autores=Autor::all();
        $editoras=Editora::all();

        $idLivro=$req->id;
        $livro=Livro::where('id_livro',$idLivro)->with(['autores','editoras','user'])->first();
        if(Gate::allows('atualizar-livro',$livro) || Gate::allows('admin')){
            
            $autoresLivro= [];
            foreach($livro->autores as $autor){
                $autoresLivro[]=$autor->id_autor;
            }

            $editorasLivro= [];
            foreach($livro->editoras as $editora){
                $editorasLivro[]=$editora->id_editora;
            }


            return view('livros.edit',[
                'livro'=>$livro,
                'generos'=>$generos,
                'autores'=>$autores,
                'editoras'=>$editoras,
                'autoresLivro'=>$autoresLivro,
                'editorasLivro'=>$editorasLivro,
            ]);
        }
        else{
            return redirect()->route('livros.index')->with('msg','Sem permissão');
        }
       
    }

    public function update(Request $req){

        $idLivro=$req->id;
        $livro=Livro::where('id_livro',$idLivro)->first();
        if(Gate::allows('atualizar-livro',$livro) ||Gate::allows('admin')){
            $atualizarLivro=$req->validate([
                'titulo'=>['required','min:3','max:100'],
                'idioma'=>['required','min:3','max:20'],
                'total_paginas'=>['nullable','numeric','min:1'],
                'data_edicao'=>['nullable','date'],
                'isbn'=>['nullable','min:13','max:13'],
                'observacoes'=>['nullable','min:3','max:1000'],
                'imagem_capa'=>['nullable','image','max:2000
                '],
                'id_genero'=>['nullable','numeric'],
                'sinopse'=>['nullable','min:3','max:255']
            ]);
            
            if($req->hasFile('imagem_capa')){
                $nomeImagem=$req->file('imagem_capa')->getClientOriginalName();

                $nomeImagem=time().'_'.$nomeImagem;
                $guardarImagem=$req->file('imagem_capa')->storeAs('imagens/livro',$nomeImagem);

                $atualizarLivro['imagem_capa']=$nomeImagem;
            }

            $editoras=$req->id_editora;
            $autores=$req->id_autor;

            $livro->update($atualizarLivro);
            $livro->autores()->sync($autores);
            $livro->editoras()->sync($editoras);

            return redirect()->route('livros.show',[
                'id'=>$livro->id_livro
            ]);
        }
        else{
            return redirect()->route('livros.index')->with('msg','Sem permissão');
        }
    }

    public function delete(Request $r){

        $livro= Livro::where('id_livro', $r->id)->first();
        if(Gate::allows('atualizar-livro',$livro) ||Gate::allows('admin')){
            
            if(is_null($livro)){

                return redirect()->route('livros.index')->with('msg','O livro não existe');
            }
            else{

                return view('livros.delete',[
                    'livro'=>$livro,
                ]);
            }
        }
        else{
            return redirect()->route('livros.index')->with('msg','Sem permissão');
        }

    }

    public function destroy(Request $r){

        $livro= Livro::where('id_livro', $r->id)->first();
        if(Gate::allows('atualizar-livro',$livro) ||Gate::allows('admin')){
            $autoresLivro=Livro::findOrfail($r->id)->autores;
            $editorasLivro=Livro::findOrfail($r->id)->editoras;
            $livro->autores()->detach($autoresLivro);
            $livro->editoras()->detach($editorasLivro);

            if(is_null($livro)){

                return redirect()->route('livros.index')->with('msg','O livro não existe');
            }
            else{

                $livro->delete();
                return redirect()->route('livros.index')->with('msg','Livro eliminado');
            }
        }
        else{
            return redirect()->route('livros.index')->with('msg','Sem permissão');
        }
    }

    public function like(Request $req){

        $idLivro=$req->id;
        $userAtual=Auth::user()->id;
        $utilizador=Like::where('id_user', $userAtual)->where('id_livro', $idLivro)->first();
        if(!isset($utilizador)){
            if(Auth::check()){
                $novoLike['id_livro']=$idLivro;
                $novoLike['id_user']=$userAtual;
                $like=Like::create($novoLike);
            }
            return redirect()->route('livros.show',['id'=>$idLivro]);

        }
        
    }
}
