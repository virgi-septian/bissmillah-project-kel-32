@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts._flash')
                <div class="card text-light bg-light border-secondary">
                    <div class="card-header mb-3 border-bottom border-1 text-black">Data Kategori Produk
                        <a href="{{ route('kategori_produk.create') }}"
                            class="btn btn-sm btn-primary" style="float: right;"><i class="bi bi-plus-square pe-2"></i>Add Data
                        </a>
                    </div>

                    <div class="card-body border-primary">
                        <div class="table-responsive">
                            <table class="table align-middle" class="tabelsaya" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori Produk</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($kategoriproduk as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->kategori_produk }}</td>
                                            <td>
                                                <form action="{{ route('kategori_produk.destroy', $data->id) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <a href="{{ route('kategori_produk.edit', $data->id) }}"
                                                        class="btn btn-sm btn-outline-warning overflow-hidden"><i class="bi bi-pencil-fill pe-2"></i>Edit
                                                    </a> |
                                                    <a href="{{ route('kategori_produk.show', $data->id) }}"
                                                        class="btn btn-sm btn-outline-info"><i class="bi bi-eye-fill pe-2"></i>Show
                                                    </a> |
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Are You Sure?')"><i class="bi bi-trash pe-2"></i>Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection