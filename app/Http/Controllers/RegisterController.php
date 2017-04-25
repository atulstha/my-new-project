<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
            public function view(){
                $users = User::all();   
            	return view ('view', ['userslist'=>$users]);

            }

/*            public function register(){
            	return view ('register');
            }
                
            public function registercheck(Request $request){
                echo 'procees';
                exit;
            }


            public function login(){
               	$users = user::all();   
            	return view ('login', ['userslist'=>$users]);
            }*/




            public function main(){      	
             	 return view ('main');
            }


            public function edit($id){
                  $user= User::find($id);
                 return view ('edit', compact ('user'));   
            }

            public function update(Request $request){
                 $user= User::find($request['id']);
                 $user->name= $request['name'];
                 $user->email= $request['email'];
                 $user->password= $request['password'];
                 if ($user->save()){
                    return redirect('view');
                 }

            }
    //
            public function delete($id){
                  if ( Recipe::find($id)->delete() ){
                 return redirect ('view');   
                }
            }       
}
