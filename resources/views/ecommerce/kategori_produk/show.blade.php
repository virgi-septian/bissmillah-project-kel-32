@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts._flash')
                <div class="card border-secondary bg-gray text-light">
                    <div class="card-header mb-3 border-bottom border-1">Data Jurusan</div>

                    <div class="card-body">

                        <div class="mb-3">
                            <label for="kmp">Kategori Produk</label>
                            <input type="text" id="kmp" name="kode_mata_pelajaran" value="{{ $kategoriproduk->kategori_produk }}" class="form-control" readonly>
                        </div>
                        
                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <a href="{{ route('kategori_produk.index') }}" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection