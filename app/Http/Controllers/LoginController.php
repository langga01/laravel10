<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function login_proses(Request $request){
        // dd($request->all());
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($data)){
            return redirect()->route('admin.dashboard')->with('success','Anda Berhasil Login');
        }else{
            return redirect()->route('login')->with('failed','Username atau Password salah');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success','Anda sudah logout');
    }

    public function register() {
        return view('auth.register');
    }

    public function register_proses(Request $request) {
        
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ],[
            'required' => 'Tidak Boleh Kosong',
            'min' => 'Minimal terdiri dari 8 Karakter',
            'unique' => 'Email sudah tersedia'
        ]);

        // dd($request->all());

        $data['email']=$request->email;
        $data['name']=$request->nama;
        $data['password']=Hash::make($request->password);

        User::create($data);

        $login = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($login)){
            return redirect()->route('admin.dashboard')->with('success','Anda Berhasil Mendaftar');
        }else{
            return redirect()->route('login')->with('failed','Username atau Password salah');
        }
    }
}
