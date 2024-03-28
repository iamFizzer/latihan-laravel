@extends('index')

@section('MainContent')
    <h1>ini Detail Data user</h1>
   <div class="card">
    <div class="card-header"><h1>Detail Data</h1> </div>
        <div class="card-body">
                <div class="form-group">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{$user->nama}}" readonly>
                </div>
                <div class="form-group">
                    <label for="kelas" class="form-label">Kelas</label>
                    <input type="text" name="kelas" id="kelas" class="form-control" value="{{$user->kelas}}" readonly>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <input type="text" name="kelas" id="kelas" class="form-control" value="{{$user->jenis_kelamin}}" readonly>
                </div>
                <div class="form-group">
                    <label for="foto" class="form-label">Foto</label>
                    <img src="{{asset('gambar')}}/{{$user->foto}}" alt="" width="100px">
                </div>

                <div class="card-footer">
                    <a href="/user" class="btn btn-danger">Kembali</a>
                </div>
        </div>
   </div>
@endsection