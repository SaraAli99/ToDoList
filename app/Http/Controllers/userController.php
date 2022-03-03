<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class studentController extends Controller
{


    public function create(){
        return view('ragister');
       }


       public function Store(Request $request){

       $data =  $this->validate($request,[
               "name"     => "required|min:3",
               "email"    => "required|email",
               "password" => "required|min:6"
        ]);

       $data['password'] = bcrypt($data['password']);

       $op = user :: create($data);

        if($op){
            $message = 'data inserted';
        }else{
            $message =  'error try again';
        }

        session()->flash('Message',$message);

        return redirect(url('/task/create/'));



    }




       public function login(){
           return view('login');
       }


       public function doLogin(Request $request){

        $data =  $this->validate($request,[
            "password"  => "required|min:6",
            "email"     => "required|email"
          ]);


          if(auth()->attempt($data)){

           return redirect(url('/user'));

          }else{
              session()->flash('Message','invalid Data');
              return redirect(url('/Login'));
          }


       }




       public function LogOut(){
           // code .....

           auth()->logout();
           return redirect(url('/Login'));
       }


}


