<?php

namespace App\Http\Controllers;


use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use Alert;

class LoginController extends Controller
{
    public function index(){
        if (auth()->user()) {
            return redirect()->route('dashboard');
        } else {
            $users = User::where('jabatan_id', '>', 6)->where('jabatan_id', '!=', null)->get();
            return view('login', compact('users'));
        }
    }

    public function loginAksi(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Alert::toast('Anda berhasil login', 'success')
                ->autoClose(2000)->position('bottom-end');
            return redirect()->intended(route('dashboard'));
        } 

        return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('login');
    }
}
