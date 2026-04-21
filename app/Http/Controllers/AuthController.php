<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

public function loginPage(){
return view('login');
}

public function registerPage(){
return view('register');
}

// public function register(Request $req){

// $user = User::create([
// 'name'=>$req->name,
// 'username'=>$req->username,
// 'password'=>Hash::make($req->password)
// ]);

// session(['user'=>$user->id]);

// return redirect('/');
// }

public function register(Request $req)
{
    $req->validate([
        'name' => 'required|string|max:50',
        'username' => 'required|string|min:3|max:20|unique:users,username',
        'password' => 'required|string|min:4',
    ]);

    $user = User::create([
        'name' => $req->name,
        'username' => $req->username,
        'password' => Hash::make($req->password),
    ]);

    session(['user' => $user->id]);

    return redirect('/');
}

public function login(Request $req){

$user = User::where('username',$req->username)->first();

if(!$user) return back();

if(!Hash::check($req->password,$user->password)) return back();

session(['user'=>$user->id]);

return redirect('/');
}

public function logout(){
session()->forget('user');
return redirect('/login');
}

}