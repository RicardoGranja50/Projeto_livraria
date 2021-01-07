<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Auth;

class UsersController extends Controller
{
    //

    public function show(){

        if(Gate::allows('admin')){
            
            $users=User::all();

            return view('users.show',[
                'users'=>$users
            ]);
        }
        else{
            return redirect()->route('livros.index')->with('msg','Sem permissão');
        }
    }
}
