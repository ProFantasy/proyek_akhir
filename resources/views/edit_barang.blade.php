<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Update Barang</title >
</head>
<body>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                Edit Data Barang
            </div>
            <div class="card-body">
                <form name="" id="" method="post" action="{{url('update_barang')}}/{{ $post->kode_barang }}">
                @csrf
                    <div class="form-group">
                        <label for="kode_barang">Kode Barang</label>
                        <input type="text" id="kode_barang" name="kode_barang" class="form-control @error('kode_barang') is-invalid @enderror""  value="{{ $post->kode_barang }}">
                        @error('kode_barang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" id="nama_barang" name="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror""  value="{{ $post->nama_barang }}">
                        @error('nama_barang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga_barang">Harga Barang</label>
                        <input type="number" id="harga_barang" name="harga_barang" class="form-control @error('harga_barang') is-invalid @enderror""  value="{{ $post->harga_barang }}">
                        @error('harga_barang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_barang">Deskripsi</label>
                        <textarea name="deskripsi_barang" class="form-control @error('deskripsi_barang') is-invalid @enderror"" >{{ $post->deskripsi_barang }}</textarea>
                        @error('deskripsi_barang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="stok_barang">Stok</label>
                        <input type="text" id="stok_barang" name="stok_barang" class="form-control @error('stok_barang') is-invalid @enderror"" " value="{{ $post->stok_barang }}">
                        @error('stok_barang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    <a class="btn btn-danger mt-2" href="{{ url('tampil_barang') }}">Batal</a>
                </form>
            </div>
        </div>
        </div>
</body>
</html>