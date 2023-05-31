@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header mb-3 border-bottom border-3"><h4>Stock obat</h4>
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
                <th>Nama Obat</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Stock</th>
                <th>Keterangan</th>
                <th>Update Terakhir</th>
                <th>Admin</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                
            </tbody>
        </table>
        <div class="col-lg-4 col-md-6">
            {{-- <select class="form-select" data-width="100%" name="obat" id="obat">
                <option selected>Pilih Obat</option>
                @foreach($obat as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option> 
                @endforeach
            </select> --}}
            <!-- Button trigger modal -->
            <!-- Modal -->
            <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Stock Obat</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                    </div>
                    <form action="{{ route('data-master.stock-obat.store') }}" id="forms" method="POST">
                        @csrf
                        <div class="modal-body">
                            
                            <div class="row">
                                <div class="col mb-3">
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="obat" class="form-label">Nama Obat</label>
                                        {{-- <input class="form-control" name="obat" list="obats">
                                        <datalist id="obats">
                                            @foreach($obat as $item)
                                                <option value="{{ $item->id }}">
                                            @endforeach
                                        </datalist>
                                        <br> --}}
                                        <select class="form-select" data-width="100%" name="obat" id="obat">
                                            <option selected>Pilih Obat</option>
                                            @foreach($obat as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option> 
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input
                                    type="text"
                                    id="id"
                                    autocomplete="off" name="id"
                                    hidden                                    
                                />
                                </div>
                            </div>
                            <div>
                                <h5 class="modal-title" id="modalCenterTitle">Stock Obat</h5>
                                <hr style="border: 1px solid rgb(8, 4, 255);">
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="col mb-3">
                                        <label for="kode" class="form-label">Stock Awal</label>
                                        <input
                                            maxlength="8"
                                            type="text"
                                            id="stock_lama"
                                            autocomplete="off" 
                                            name="stock_lama"
                                            class="form-control"
                                            readonly
                                        />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col mb-3">
                                        <label for="masuk" class="form-label">Masuk</label>
                                        <input
                                            onkeypress="return number(event)"
                                            type="text"
                                            id="masuk"
                                            autocomplete="off" name="masuk"
                                            class="form-control"
                                            value="0"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col mb-3">
                                        <label for="keluar" class="form-label">Keluar</label>
                                        <input
                                            onkeypress="return number(event)"
                                            type="text"
                                            id="keluar"
                                            autocomplete="off" name="keluar"
                                            class="form-control"
                                            value="0"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="stock" class="form-label">Stock Akhir</label>
                                    <input
                                        onkeypress="return number(event)"
                                        type="text"
                                        readonly
                                        id="stock"
                                        autocomplete="off" name="stock"
                                        class="form-control"
                                        placeholder="Dosis"
                                    />
                                </div>
                            </div>
                            <div>
                                <h5 class="modal-title" id="modalCenterTitle">Stock Obat</h5>
                                <hr style="border: 1px solid rgb(8, 4, 255);">
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                <label for="beli" class="form-label">Harga Beli</label>
                                <input
                                    onkeypress="return number(event)"
                                    type="text"
                                    id="beli"
                                    maxlength="12"
                                    autocomplete="off" name="beli"
                                    class="form-control"
                                />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                <label for="jual" class="form-label">Harga Jual</label>
                                <input
                                    onkeypress="return number(event)"
                                    type="text"
                                    id="jual"
                                    maxlength="12"
                                    autocomplete="off" name="jual"
                                    class="form-control"
                                />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                <label for="expired" class="form-label">Tanggal Expired</label>
                                <input
                                    type="date"
                                    id="expired"
                                    autocomplete="off" name="expired"
                                    class="form-control"
                                />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input
                                    type="text"
                                    id="keterangan"
                                    autocomplete="off" name="keterangan"
                                    class="form-control"
                                    placeholder="keterangan"
                                />
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
<script src="{{asset('js/select2.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        loaddata()
        // $('#obat').select2();
    });


    function loaddata() {
        $('#dataTable').DataTable({
            serverside: true,
            processing: true,
            ajax: {
                url : "{{ route('data-master.stock-obat.index') }}",
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
                { data: 'namaObat', name: 'namaObat' },
                { data: 'beli', name: 'beli' },
                { data: 'jual', name: 'jual' },
                { data: 'stock', name: 'stock' },
                { data: 'keterangan', name: 'keterangan' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'admins', name: 'admins' },
                { data: 'aksi', name: 'aksi', orderable: false },
                
            ],
        });
    }

    function number(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57 ))
                return false;
            return true;    
    }

    $(document).on('change', '#obat', function () {
        let id = $(this).val()
        $.ajax({
            url : "{{ route('data-master.getObat') }}",
            type: 'post',
            data: {
                id: id,
                _token: "{{ csrf_token() }}"
            },
            success: function(res) {
                console.log(res);
                $('#stock_lama').val(res.data.stock)
            },
            error: function(xhr) {
                console.error(xhr);
            }
        })
    })

    $(document).on('blur', '#masuk', function () {
        let awal = parseInt($('#stock_lama').val()) 
        let masuk = parseInt($('#masuk').val()) 
        let keluar = parseInt($('#keluar').val()) 
        let akhir = (awal + masuk) - keluar
        $('#stock').val(akhir)
    })

    $(document).on('blur', '#keluar', function () {
        let awal = parseInt($('#stock_lama').val()) 
        let masuk = parseInt($('#masuk').val()) 
        let keluar = parseInt($('#keluar').val()) 
        let akhir = (awal + masuk) - keluar
        $('#stock').val(akhir)
    })

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
                $('#forms').attr('action',"{{route('data-master.stock-obat.store')}}")
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
        $('#forms').attr('action',"{{ route('data-master.stock-obat.updates') }}")
        let id = $(this).attr('id')
        $.ajax({
            url : "{{ route('data-master.stock-obat.edits') }}",
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
                    $('#forms').attr('action',"{{route('data-master.stock-obat.store')}}")
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
                    url : "{{ route('data-master.stock-obat.destroy') }}",
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