<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Update Data Pembelian</title >
</head>
<body>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                Edit Data Pembelian
            </div>
            <div class="card-body">
                <form name="" id="" method="post" action="{{url('update_pembelian')}}/{{ $post->id }}">
                @csrf
                <div class="form-group">
                        <label for="nama_barang" class="mb-2 mt-3">Nama Barang</label>
                        <select class="form-control @error('id_barang') is-invalid @enderror" id="position-option" name="id_barang">
                                @foreach ($barang as $item)
                                    <option value="{{ $item->kode_barang }}" {{$post->id_barang == $item->kode_barang? 'selected' : null}}{{ old('id_barang') == $item->kode_barang? 'selected' : null }}{{ old('id_barang') == $item->kode_barang? 'selected' : null}}>{{ $item->nama_barang }}</option>
                                @endforeach
                        </select>
                                @error('kode_barang')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                </div>
                <div class="form-group">
                        <label for="nama" class="mb-2 mt-3">Nama Pembeli</label>
                        <select class="form-control @error('id_pembeli') is-invalid @enderror" id="position-option" name="id_pembeli">
                                @foreach ($customer as $items)
                                    <option value="{{ $items->ktp }}" {{$post->id_pembeli == $items->ktp? 'selected' : null}}{{ old('id_pembeli') == $items->ktp? 'selected' : null}}>{{ $items->nama }}</option>
                                @endforeach
                        </select>
                                @error('ktp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal_pembelian">Tanggal Pembelian</label>
                    <input type="date" id="tanggal_pembelian" name="tanggal_pembelian" class="form-control @error('tanggal_pembelian') is-invalid @enderror"  value="{{$post -> tanggal_pembelian}}">
                    @error('tanggal_pembelian')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah Pembelian</label>
                    <input type="number" id="jumlah" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror"  min="1" value="{{$post -> jumlah}}">
                    @error('jumlah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kurir">Kurir</label>
                    <select class="form-control @error('kurir') is-invalid @enderror" name="kurir" id="kurir">
                        <option
                        @php
                            $kurir = $post -> kurir;
                        @endphp
                        @if($kurir == 'JNE')
                            {{'selected'}}
                        @endif
                        value="JNE">JNE</option>
                        <option
                        @php
                            $kurir = $post -> kurir;
                        @endphp
                        @if($kurir == 'SiCepat')
                            {{'selected'}}
                        @endif
                        value="SiCepat">SiCepat</option>
                        <option
                        @php
                            $kurir = $post -> kurir;
                        @endphp
                        @if($kurir == 'J&T')
                            {{'selected'}}
                        @endif
                        value="J&T">J&T</option>
                        <option
                        @php
                            $kurir = $post -> kurir;
                        @endphp
                        @if($kurir == 'AntarAja')
                            {{'selected'}}
                        @endif
                        value="AntarAja">AntarAja</option>
                    </select>
                    @error('kurir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    <a class="btn btn-danger mt-2" href="{{ url('tampil_pembelian') }}">Batal</a>
                </form>
            </div>
        </div>
        </div>
</body>
</html>