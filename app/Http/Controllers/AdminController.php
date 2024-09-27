<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRegister;
use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    //

    public function login_page(){
        return view('Auth.Admin.login');
    }
    public function register_page(){
        return view('Auth.Admin.register');
    }
    public function register(AdminRegister $request){
       $user = User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>bcrypt($request->password),
        'category_name'=>$request->category_name,
        'user_type'=>'admin',
       ]);
       Auth::login($user);
       $request->session()->regenerate();
       return redirect()->route('admin.dashboard')->with('success','Admin account created successfully');
    }
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(Auth::user()->user_type=='admin'){
                return redirect()->route('admin.dashboard');
            }else {
                return redirect()->route('user.dashboard'); 
            }
        }else{
            abort(401);
        }
    }
    public function dashboard(){
        return view('Auth.Admin.dashboard');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

}
