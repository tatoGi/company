<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Hashing\Hasher;
use App\Models\User;

class UserAuthController extends Controller
{
    function login(){
       return view('auth.login');
    }
    function register(){
        return view('auth.register');
     }

     function create(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=> 'required|email|unique:users',
            'password'=> 'required|min:5|max:12'
        ]);
        
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $query = $user->save();


        if($query){
            return back()->with('success', 'You have been succsessfuly register');
        }else{
            return back()->with('fail','somthing went wrong');
        }
        }
        function check(Request $request){
           $request->validate([
               'email'=> 'required|email',
               'password'=>'required|min:5|max:12'
           ]);

           //if form validated successfully, the process login//
           $user = User::where('email','=',$request->email)->first();
           if($user){
             if(Hash::check($request->passwrod, $user->password)){
                // if password match, then redirect user to profile
                $request->session()->put('loggedUser', $user->id);
                return redirect('profile');
             }else{
                 return back()->with('fail, invalid password');
             }
           }else{
               return back()->with('fail', 'No account found for thies email');
           }
        }
        function profile(){
            if (session()->has('loggedUser')){
                $user = User::where('id', '=', session ('loggedUser'))->first();
                $data=[
                    'loggedUserInfo'=>$user
                ];
                return view('admin.profile, $data');
            }
        }
        function logout(){
            if(session()->has('loggedUser')){
                session()->pull('loggedUser');
                return redirect('login');
            }
        }
     }

     
 

