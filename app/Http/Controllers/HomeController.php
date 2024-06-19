<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\RabList1;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function dashboard()
    {
        // dd(Auth::user());
        return view('dashboard');
    }
    // public function spbe()
    // {
    //     $domains = Domain::get();

    //     return view('spbe/spbe', ['domains' => $domains]);
    // }

    public function index(Request $request)
    {
        // $data= new User;


        if ($request->ajax()) {
            $data = new User;
            $data = $data->latest();

            return DataTables::of($data)
                ->addColumn('no', function ($data) {
                    return 'ini nomor';
                })
                ->addColumn('photo', function ($data) {
                    return 'photo';
                })
                ->addColumn('nama', function ($data) {
                    return $data->name;
                })
                ->addColumn('email', function ($data) {
                    return $data->email;
                })
                ->addColumn('action', function () {
                    return 'action';
                })->make(true);
        }

        // if($request->get('search')){
        //     $data = $data->where('name', 'LIKE', '%'.$request->get('search').'%')
        //     ->orWhere('email', 'LIKE', '%'.$request->get('search').'%');
        // };

        // $data = $request->ajax();

        // dd($data);

        return view('index', compact('request'), ['tittle' => 'User']);
    }

    public function create()
    {
        return view('create', ['tittle' => 'Create']);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'photo' => 'nullable|mimes:png,jpg,jpeg|max:2048',
                'email' => 'required|email',
                'nama' => 'required',
                'password' => 'required|min:8',
            ],
            [
                'required' => 'Tidak Boleh Kosong',
                'min' => 'Minimal terdiri dari 8 Karakter'
            ]
        );

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        // dd($request->all());

        if ($request->file) {
            $photo = $request->file('photo');
            $filename = date('Y-m-d') . $photo->getClientOriginalName();
            $path = 'photo-user/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($photo));
            $data['image'] = $filename;
        };


        $data['email'] = $request->email;
        $data['name'] = $request->nama;
        $data['password'] = Hash::make($request->password);


        // dd($data);

        User::create($data);

        return redirect()->route('admin.index');
        // dd($request->all());
    }

    public function edit(Request $request, $id)
    {
        $data = User::find($id);
        // dd($data);

        return view('edit', compact('data'), ['tittle' => 'Profile']);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'photo' => 'required|mimes:png,jpg,jpeg|max:2048',
                'email' => 'required|email',
                'nama' => 'required',
                'password' => 'nullable|min:8',
            ]
        );

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $photo = $request->file('photo');
        $filename = date('Y-m-d') . $photo->getClientOriginalName();
        $path = 'photo-user/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($photo));

        $data = $filename;
        $data['email'] = $request->email;
        $data['name'] = $request->nama;

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        User::whereId($id)->update($data);

        return redirect()->route('admin.index');
    }

    public function delete(Request $request, $id)
    {
        $data = User::find($id);

        if ($data) {
            $data->delete();
        }

        return redirect()->route('admin.index');
    }
}
