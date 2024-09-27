<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRegister;
use App\Http\Requests\UserRegister;
use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function login_page(){
        return view('Auth.User.login');
    }
    public function register_page(){
        return view('Auth.User.register');
    }
    public function register(UserRegister $request){
       $user = User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>bcrypt($request->password),
        'user_type'=>'user',
       ]);
       Auth::login($user);
       $request->session()->regenerate();
       return redirect()->route('user.dashboard')->with('success','User account created successfully');
    }
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(Auth::user()->user_type=='user'){
                return redirect()->route('user.dashboard');
            }else{
                return redirect()->route('admin.dashboard');
            }
        }else{
            abort(401);
        }
    }
    public function dashboard(){
        return view('Auth.User.dashboard');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
