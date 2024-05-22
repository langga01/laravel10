<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function dashboard(){
        return view('dashboard');
    }
    
    public function index(){
        $data=User::get();
        return view('index',compact('data'),['tittle'=>'User']);
    }

    public function create(){
        return view('create',['tittle'=>'Create']);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),
        [
            'email' => 'required|email',
            'nama' => 'required',
            'password' => 'required|min:8',
        ],[
            'required' => 'Tidak Boleh Kosong',
            'min' => 'Minimal terdiri dari 8 Karakter'
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['email']=$request->email;
        $data['name']=$request->nama;
        $data['password']=Hash::make($request->email);

        User::create($data);

        return redirect()->route('index');
        // dd($request->all());
    }

    public function edit(Request $request, $id){
        $data = User::find($id);
        // dd($data);

        return view('edit',compact('data'), ['tittle' => 'Edit']);
    }

    public function update(Request $request, $id){
            $validator = Validator::make($request->all(),
            [
                'email' => 'required|email',
                'nama' => 'required',
                'password' => 'nullable|min:8',
            ]);
    
            if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
    
            $data['email']=$request->email;
            $data['name']=$request->nama;

            if($request->password){
                $data['password']=Hash::make($request->email);
            }
    
            User::whereId($id)->update($data);
    
            return redirect()->route('index');
    }

    public function delete(Request $request, $id) {
        $data = User::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('index');
    }
}
