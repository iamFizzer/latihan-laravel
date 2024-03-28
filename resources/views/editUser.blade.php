@extends('index')

@section('MainContent')
    <h1>ini Edit Data user</h1>
   <div class="card">
    <div class="card-header"><h1>Edit Data</h1> </div>
        <div class="card-body">
            <form action="/edituser/{{$user->id}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{$user->nama}}" required>
                </div>
                <div class="form-group">
                    <label for="kelas" class="form-label">Kelas</label>
                    <input type="text" name="kelas" id="kelas" class="form-control" value="{{$user->kelas}}" required>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" value="{{$user->jenis_kelamin}}" required>
                        <option value="">select...</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="foto" class="form-label">Foto</label>
                    <img src="{{asset('gambar')}}/{{$user->foto}}" alt="" width="100px">
                    <input type="file" class="form-control" name="foto" id="foto" >
                </div>

                <div class="card-footer">
                    <a href="/user" class="btn btn-danger">Batal</a>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
   </div>
@endsection