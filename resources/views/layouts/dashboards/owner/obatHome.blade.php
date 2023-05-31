@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header mb-3 border-bottom border-3"><h4>Katalog Obat</h4>
        <button
        type="button"
        data-bs-toggle="modal"
        data-bs-target="#modalCenter" 
        id="btn-tambah"
        class="btn btn-sm btn-primary">
        <i class="bi bi-plus-square pe-2"></i>
        Add Data
        </button>
    </div>
    <div class="card-body">
        <table class="table align-middle" id="dataTable" style="width: 100%">
            
            <thead>
                <th>No.</th>
                <th>Nama</th>
                <th>Kode</th>
                <th>Dosis</th>
                <th>Indikasi</th>
                <th>Kategori</th>
                <th>Satuan</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                
            </tbody>
        </table>
        <div class="col-lg-4 col-md-6">
            <!-- Button trigger modal -->
            <!-- Modal -->
            <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                    </div>
                    <form action="{{ route('data-master.obat.store') }}" id="forms" method="POST">
                        @csrf
                        <div class="modal-body">
                            
                            <div class="row">
                                <div class="col mb-3">
                                <label for="nama" class="form-label">Nama Obat</label>
                                <input
                                    type="text"
                                    id="nama"
                                    autocomplete="off" name="nama"
                                    class="form-control @error('nama') is-invalid @enderror"
                                    placeholder="Nama Obat"
                                />
                                <input
                                    type="text"
                                    id="id"
                                    autocomplete="off" name="id"
                                    hidden                                    
                                />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                <label for="kode" class="form-label">Kode</label>
                                <input
                                    maxlength="8"
                                    type="text"
                                    id="kode"
                                    autocomplete="off" name="kode"
                                    class="form-control"
                                    placeholder="Kode"
                                />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="dosis" class="form-label">Dosis</label>
                                    <input
                                        type="text"
                                        id="dosis"
                                        autocomplete="off" name="dosis"
                                        class="form-control"
                                        placeholder="Dosis"
                                    />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                <label for="indikasi" class="form-label">Indikasi</label>
                                <input
                                    type="text"
                                    id="indikasi"
                                    autocomplete="off" name="indikasi"
                                    class="form-control"
                                    placeholder="Indikasi"
                                />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                <label class="form-label">Kategori</label>
                                <select class="form-select" autocomplete="off" name="kategori_id" id="kategori_id" aria-label="Default select example">
                                    <option selected>Pilih Kategori</option>
                                    @foreach($kategori as $item)
                                        <option value="{{ $item->id }}">{{ $item->kategori }}</option> 
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                <label class="form-label">Satuan</label>
                                <select class="form-select" autocomplete="off" name="satuan_id" id="satuan_id" aria-label="Default select example">
                                    <option selected>Pilih Satuan</option>
                                    @foreach($satuan as $item)
                                        <option value="{{ $item->id }}">{{ $item->satuan }}</option> 
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" id="btn-tutup" name="batal" class="btn btn-outline-danger" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" id="simpan" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('js/jquery-3.5.1.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        loaddata()
    });


    function loaddata() {
        $('#dataTable').DataTable({
            serverside: true,
            processing: true,
            ajax: {
                url : "{{ route('data-master.obat.index') }}",
                type: 'GET'
            },
            
            columnDefs: [
                {
                "defaultContent": "-",
                "targets": "_all"
                }
            ],
            columns: [
                {
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                { data: 'nama', name: 'nama' },
                { data: 'kode', name: 'kode' },
                { data: 'dosis', name: 'dosis' },
                { data: 'indikasi', name: 'indikasi' },
                { data: 'kategoris', name: 'kategoris' },
                { data: 'satuans', name: 'satuans' },
                { data: 'aksi', name: 'aksi', orderable: false },
                
            ],
        });
    }
    
    $(document).on('submit', 'form', function (event){
        event.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            typeData: "JSON",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (res) {
                console.log(res);
                $('#btn-tutup').click()
                $('#dataTable').DataTable().ajax.reload()
                $('#modalCenter').on("hidden.bs.modal", function(){
                    $('#forms')[0].reset()
                    $('#forms').attr('action',"{{route('data-master.obat.store')}}")
                });
                iziToast.success({
                    title: 'OK',
                    message: res.text,
                });
            },
            error: function (xhr) {
                iziToast.warning({
                    title: 'Gagal',
                    message: xhr.responseJSON.text,
                });
            }
        })
    })

    $(document).on('click', '.edit', function () {
         $('#forms').attr('action',"{{ route('data-master.obat.updates') }}")
         let id = $(this).attr('id')
         $.ajax({
            url : "{{ route('data-master.obat.edits') }}",
            type: 'post',
            data: {
                id: id,
                _token: "{{ csrf_token() }}"
            },
            success: function (res) {
                $('#id').val(res.id)
                $('#nama').val(res.nama)
                $('#kode').val(res.kode)
                $('#dosis').val(res.dosis)
                $('#indikasi').val(res.indikasi)
                $('#kategori_id').val(res.kategori_id)
                $('#satuan_id').val(res.satuan_id)
                $('#btn-tambah').click()
                $('#modalCenter').on("hidden.bs.modal", function(){
                    $('#forms')[0].reset()
                    $('#forms').attr('action',"{{route('data-master.obat.store')}}")
                });
            },
            error: function (xhr) {
                console.log(xhr);
            }
        })
    })
    // Hapus
    $(document).on('click', '.hapus', function () {
        let id = $(this).attr('id')
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url : "{{ route('data-master.obat.destroy') }}",
                    type: 'post',
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(res, status){
                        if (status = '200'){
                            setTimeout(() => {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Data Berhasil Dihapus',
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then((res) => {
                                    $('#dataTable').DataTable().ajax.reload()
                                })
                            });
                        }
                    },
                    error: function(xhr){
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Gagal Menghapus',
                        })
                    }
                })
            }
        })
    })
</script> 
@endsection