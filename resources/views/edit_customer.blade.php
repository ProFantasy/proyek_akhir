<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Update Data Customer</title >
</head>
<body>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                Edit Data Customer
            </div>
            <div class="card-body">
                <form name="" id="" method="post" action="{{url('update_customer')}}/{{ $post->ktp }}">
                @csrf
                    <div class="form-group">
                        <label for="ktp">KTP</label>
                        <input type="text" id="ktp" name="ktp" class="form-control @error('ktp') is-invalid @enderror""  value="{{ $post->ktp }}">
                        @error('ktp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror""  value="{{ $post->nama }}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror"" >{{ $post->alamat }}</textarea>
                        @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No. Hp</label>
                        <input type="text" id="no_hp" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror"" " value="{{ $post->no_hp }}">
                        @error('no_hp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="umur">Umur</label>
                        <input type="text" id="umur" name="umur" class="form-control @error('umur') is-invalid @enderror"" " value="{{ $post->umur }}">
                        @error('umur')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <input type="text" id="jenis_kelamin" name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror"" " value="{{ $post->jenis_kelamin }}">
                        @error('jenis_kelamin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    <a class="btn btn-danger mt-2" href="{{ url('tampil_customer') }}">Batal</a>
                </form>
            </div>
        </div>
        </div>
</body>
</html>