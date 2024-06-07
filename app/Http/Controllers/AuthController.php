<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use function PHPUnit\Framework\returnValue;

class AuthController extends Controller
{
    public function login(){
        return  view('loginadmin');
    }

    public function do_login(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(Auth::guard('admin')->attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('inunut');
        }else{
            return redirect()->back();
        }
    }


    public function loginsiswa(){
        return view('loginsiswa');
    }

    public function do_loginsiswa(Request $request){
        $credentials = $request->validate([
            'nisn' => 'required',
            'password' => 'required'
        ]);

        if(Auth::guard('siswa')->attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('tumpangan');
        }else{
            return redirect()->back();
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function logoutsiswa(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('loginsiswa');
    }
}
