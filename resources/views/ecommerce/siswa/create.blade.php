@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts._flash')
                <div class="card border-secondary bg-gray text-light">
                    <div class="card-header mb-3 border-bottom border-1">Data Siswa</div>

                    <div class="card-body">
                        <form action="{{ route('siswa.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="nis">Nis</label>
                                <input type="number" id="nis" name="nis" placeholder="Masukkan Nis"
                                    class="form-control @error('nis') is-invalid @enderror">
                                @error('nis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama_siswa">Nama Siswa</label>
                                <input type="text" name="nama_siswa" id="nama_siswa" placeholder="Masukkan Nama"
                                    class="form-control @error('nama_siswa') is-invalid @enderror">
                                @error('nama_siswa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <div class="form-check">
                                    <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror"
                                        type="radio" name="jenis_kelamin" value="Laki-laki" id="lk">
                                    <label class="form-check-label" for="lk">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror"
                                        type="radio" name="jenis_kelamin" value="Perempuan" id="pr">
                                    <label class="form-check-label form-label" for="pr">
                                        Perempuan
                                    </label>
                                </div>
                                @error('jenis_kelamin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Agama</label>
                                <select class="form-select @error('agama') is-invalid @enderror" name="agama">
                                    <option selected hidden disabled>Pilih Agama</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghucu">Konghucu</option>
                                    <option value="Katolik">Katolik</option>
                                </select>
                                @error('agama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="alamat">Alamat Siswa</label>
                                <textarea type="text" name="alamat_siswa" id="alamat" placeholder="Masukkan Alamat"
                                    class="form-control @error('alamat_siswa') is-invalid @enderror"></textarea>
                                @error('alamat_siswa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tgl">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" id="tgl" placeholder="Masukkan Tanggal Lahir"
                                    class="form-control @error('nis') is-invalid @enderror">
                                @error('tanggal_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <center>
                                <div class="btn-group mt-4 pt-5" role="group" aria-label="Basic mixed styles example">
                                    <button type="submit" name="save" class="btn btn-primary">Simpan </button>
                                    <a href="{{ route('siswa.index') }}" class="btn btn-danger">Batal</a>
                                </div>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection