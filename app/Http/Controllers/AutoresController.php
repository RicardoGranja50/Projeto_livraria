<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;
use Illuminate\Support\Facades\Gate;

class AutoresController extends Controller
{
    //
    public function index(){
        //$autores = Autor::all()->sortbydesc('idl');
        $autores= Autor::paginate(4);
        return view('autores.index',[
            'autores'=>$autores
        ]);
    }
    public function show(Request $request){
        $idAutores = $request->ida;
        //$autores=Autor::findOrFail($idAutores);
        //$autores=Autor::find($idAutores);
        $autores=Autor::where('id_autor',$idAutores)->with('livros')->first();
        
        return view('autores.show',[
            'autores'=>$autores
        ]);
    }

    public function create(){

        if(Gate::allows('admin')){
            return view('autores.create');
        }
        else{
            return redirect()->route('livros.index')->with('msg','Sem permissão');
        }
    }

    public function store(Request $req){

        if(Gate::allows('admin')){
            $novoAutor=$req->validate([
                'nome'=>['required','min:3','max:100'],
                'nacionalidade'=>['nullable','min:3','max:20'],
                'data_nascimento'=>['nullable','date'],
                'fotografia'=>['nullable','min:3','max:255'],
            ]);

            $autor=Autor::create($novoAutor);

            return redirect()->route('autores.show',[
                'ida'=>$autor->id_autor
            ]);
        }
        else{
            return redirect()->route('livros.index')->with('msg','Sem permissão');
        }
    }

    public function edit(Request $req){

        if(Gate::allows('admin')){
            $idAutor=$req->ida;
            $autor=Autor::where('id_autor',$idAutor)->first();
            return view('autores.edit',[
                'autor'=>$autor
            ]);
        }
        else{
            return redirect()->route('livros.index')->with('msg','Sem permissão');
        }
    }

    public function update(Request $req){

        if(Gate::allows('admin')){
            $idAutor=$req->ida;
            $autor=Autor::where('id_autor',$idAutor)->first();

            $atualizarAutor=$req->validate([
                'nome'=>['required','min:3','max:100'],
                'nacionalidade'=>['nullable','min:3','max:20'],
                'data_nascimento'=>['nullable','date'],
                'fotografia'=>['nullable','min:3','max:255'],
            ]);
            
            $autor->update($atualizarAutor);

            return redirect()->route('autores.show',[
                'ida'=>$autor->id_autor
            ]);
        }
        else{
            return redirect()->route('livros.index')->with('msg','Sem permissão');
        }

    }

    public function delete(Request $r){

        if(Gate::allows('admin')){
            $autor= Autor::where('id_autor', $r->ida)->first();
            if(is_null($autor)){

                return redirect()->route('autores.index')->with('msg','O autor não existe');
            }
            else{

                return view('autores.delete',[
                    'autor'=>$autor,
                ]);
            }
        }
        else{
            return redirect()->route('livros.index')->with('msg','Sem permissão');
        }
    }

    public function destroy(Request $r){

        if(Gate::allows('admin')){
            $autor= Autor::where('id_autor', $r->ida)->first();
            
            if(is_null($autor)){

                return redirect()->route('autores.index')->with('msg','O autor não existe');
            }
            else{

                $autor->delete();
                return redirect()->route('autores.index');
            }
        }
        else{
            return redirect()->route('livros.index')->with('msg','Sem permissão');
            }
        }
}