@extends('index')

@section('MainContent')
    <h1>ini halaman User</h1>
    <a href="/tambahuser" class="btn btn-success">+  Tambah Data</a><br><br>
    @if (session('status'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Berhasil!!!</h5>
        {{ session('status') }}
    </div>
    @endif
    
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <td>no</td>
                <td>nama</td>
                <td>kelas</td>
                <td>jenis kelamin</td>
                <td>foto</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
           @foreach ($data as $item)
               <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->kelas}}</td>
                    <td>{{$item->jenis_kelamin}}</td>
                    <td><img src="{{asset('gambar')}}/{{$item->foto}}" alt="" width="100px"></td>
                    <td>
                        <a href="/user/detail/{{$item->id}}" class="btn btn-success">Detail</a>
                        <a href="/user/edit/{{$item->id}}" class="btn btn-warning">Edit</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </td>
               </tr>
           @endforeach
        </tbody>
    </table>
@endsection