<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\userModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $user=new userModel();
        $this->user=$user;
    }
    public function index()
    {
        $user = new userModel();
        $data = $user->alldata();
        // dd($data);
        return view('user',compact('data'));
    }

    public function tambah()
    {
        return view('tambahuser');
    }

    public function add(Request $request)
    {
        //validasi data yang diinputkan  oleh user  
        $this->validate($request,[
            'nama'=>'required|min:3|max:50',
            'kelas'=>'required',
            'jenis_kelamin'  => ['required','in:Laki-Laki,Perempuan'],
            'foto'            => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ],[
            'nama.required'     => "Nama harus diisi",
            'nama.min'          => "Nama minimal 3 karakter",   
            'nama.max'          => "Nama maksimal 50 karakter",     
            
            'foto.image'        => "Foto harus berupa gambar",
            'foto.mimes'        => "Format gambar hanya JPG, PNG, GIF, SVG",   
            'foto.max'          => "Ukuran foto terlalu besar Maksimal 2MB",
        ]);
        if ($request->file('foto')) {
            # code...
           $imgname = $request->nama.'.'.$request->foto->extension();    
           $request->foto->move(public_path('gambar'),$imgname);
       }else{
           $imgname='default.png';
       }
    //    $user = new userModel;
       $data = [
        'nama'=> $request->nama,
        'kelas'=>  $request->kelas,
        'jenis_kelamin'=> $request->jenis_kelamin,
        'foto'=> $imgname,
       ];
       $this->user->addData($data);
       return redirect('/user')->with('status','Tambah Data Berhasil!');
    }

    public function detail($id)
    {   
        $user = $this->user->find($id);
       return view( 'detailUser',compact('user'));
    }
    public function detailedit($id)
    {   
        $user = $this->user->find($id);
       return view( 'editUser',compact('user'));
    }

    public function edit(Request $request , $id)
    {
        if($request->foto <> "")
        {
            $imgname = $request->nama.'.'.$request->foto->extension();    
            $request->foto->move(public_path('gambar'),$imgname);
            $data = [
                'nama'=> $request->nama,
                'kelas'=>  $request->kelas,
                'jenis_kelamin'=> $request->jenis_kelamin,
                'foto'=> $imgname,
               ];
               $this->user->editData($data,$id);
        }else{
            $data = [
                'nama'=> $request->nama,
                'kelas'=>  $request->kelas,
                'jenis_kelamin'=> $request->jenis_kelamin,
               ];
               $this->user->editData($data,$id);
        }
        return redirect('/user')->with('status','Edit Data Berhasil!');
    }
}
