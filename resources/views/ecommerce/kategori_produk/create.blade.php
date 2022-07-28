@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts._flash')
                <div class="card border-secondary bg-gray text-light">
                    <div class="card-header mb-3 border-bottom border-1">Data Jurusan</div>

                    <div class="card-body">
                        <form action="{{ route('kategori_produk.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="kmp">Kategori Produk</label>
                                <input type="tetx" name="kategori_produk" id="kmp" placeholder="Masukkan Kategori Produk"
                                    class="form-control @error('kategori_produk') is-invalid @enderror">
                                @error('kategori_produk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <center>
                                <div class="btn-group mt-4 pt-5" role="group" aria-label="Basic mixed styles example">
                                    <button type="submit" name="save" class="btn btn-primary">Simpan </button>
                                    <a href="{{ route('kategori_produk.index') }}" class="btn btn-danger">Batal</a>
                                </div>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection