<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(){
        return view('Users.create');
    }
    public function store(Request $req){

        
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->save();
        return response($user , 201);
        }

        public function list(){
            $user = User::get();
            return response($user , 200);
        }

        public function edit($id){
            $user = User::find($id);
            return view('Users.edit',['edit'=>$user]);
    
        }

        public function update(Request $req , $id){
            $user = User::find($id);
            $user->name = $req->name;
            $user->email = $req->email;
            $user->phone = $req->phone;

              $user->save();
             return response($user , 201);
        }
        public function destroy($id){
            $delete = User::find($id);
            $delete->delete();
            return response($delete,204);

        }

       
    
}
