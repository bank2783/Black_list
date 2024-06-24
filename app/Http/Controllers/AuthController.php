<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class AuthController extends Controller
{
    // public function loginView(){
    //     return view('layout.master');
    // }

    public function loginView(){
        return view("auth.login");
    }

    public function login(Request $request){  
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended(route('show_roster_management_view'));
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function createUser(Request $request){

        $validate = $request->validate([
            'name'=> 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ],
        [
            'email.uniqe' => 'อีเมลล์นี้ถูกใช้ไปแล้ว'
        ]
    
        );

        $user_insert = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            
        ]);
        if($user_insert){
            return redirect()->back()->with('message','sucess');
        }
        else{
            back()->withErrors([
                'email' => 'อีเมลล์ซ้ำกัน+',
            ]);
        }
    }
    public function createUserView(){

        return view('auth.add_user');
    }
}