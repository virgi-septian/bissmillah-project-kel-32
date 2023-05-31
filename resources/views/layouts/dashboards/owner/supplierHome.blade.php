@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header mb-3 border-bottom border-3"><h4>Supplier</h4>
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
                <th>Telepon</th>
                <th>Email</th>
                <th>Rekening</th>
                <th>Alamat</th>
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
                    <form action="{{ route('transaksi.supplier.store') }}" id="forms" method="POST">
                        @csrf
                        <div class="modal-body">
                            
                            <div class="row">
                                <div class="col mb-3">
                                <label for="nama" class="form-label">Nama Supplier</label>
                                <input
                                    type="text"
                                    id="nama"
                                    name="nama"
                                    class="form-control"
                                    placeholder="Nama Supplier"
                                />
                                <input
                                    type="text"
                                    id="id"
                                    name="id"
                                    hidden                                    
                                />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                <label for="telp" class="form-label">No. Telepon</label>
                                <input
                                    onkeypress="return number(event)"
                                    maxlength="12"
                                    type="text"
                                    id="telp"
                                    name="telp"
                                    class="form-control"
                                    placeholder="No Telepon"
                                />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input
                                        type="text"
                                        id="email"
                                        name="email"
                                        class="form-control"
                                        placeholder="xxxx@xxx.xx"
                                    />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                <label for="rekening" class="form-label">No. Rekening</label>
                                <input
                                    onkeypress="return number(event)"
                                    type="text"
                                    id="rekening"
                                    name="rekening"
                                    class="form-control"
                                    placeholder="No. Rekening"
                                />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea
                                    type="text"
                                    id="alamat"
                                    name="alamat"
                                    class="form-control"
                                    cols="30"
                                    rows="10"
                                ></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Button to trigger modal -->


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
    $(document).ready(function () {
  // Ketika tombol di modal diklik
  $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Tombol yang memicu modal
    var id = button.data('id') // Mengambil data ID dari atribut data
    var fileType = button.data('filetype') // Mengambil jenis file dari atribut data

    var modal = $(this)

    // Lakukan permintaan AJAX untuk mengambil data
    $.ajax({
      url: '/get-data/' + id,
      type: 'GET',
      dataType: 'json',
      success: function (data) {
        // Jika permintaan berhasil, tampilkan data dalam modal
        modal.find('.modal-body').html('<p>Nama: ' + data.nama + '</p><p>Jenis file: ' + fileType + '</p><p>File: <a href="' + data.file_url + '">' + data.file_name + '</a></p>')
      },
      error: function (xhr, status, error) {
        // Jika permintaan gagal, tampilkan pesan kesalahan
        modal.find('.modal-body').html('<p>Error: ' + error + '</p>')
      }
    })
  })
})

    function loaddata() {
        $('#dataTable').DataTable({
            serverside: true,
            processing: true,
            ajax: {
                url : "{{ route('transaksi.supplier.index') }}",
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
                { data: 'telp', name: 'telp' },
                { data: 'email', name: 'email' },
                { data: 'rekening', name: 'rekening' },
                { data: 'alamat', name: 'alamat' },
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
                $('#btn-tutup').click()
                $('#dataTable').DataTable().ajax.reload()
                $('#modalCenter').on("hidden.bs.modal", function(){
                    $('#forms')[0].reset()
                    $('#forms').attr('action',"{{route('transaksi.supplier.store')}}")
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
         $('#forms').attr('action',"{{ route('transaksi.supplier.updates') }}")
         let id = $(this).attr('id')
         $.ajax({
            url : "{{ route('transaksi.supplier.edits') }}",
            type: 'post',
            data: {
                id: id,
                _token: "{{ csrf_token() }}"
            },
            success: function (res) {
                $('#id').val(res.id)
                $('#nama').val(res.nama)
                $('#telp').val(res.telp)
                $('#email').val(res.email)
                $('#rekening').val(res.rekening)
                $('#alamat').val(res.alamat)
                $('#btn-tambah').click()
                $('#modalCenter').on("hidden.bs.modal", function(){
                    $('#forms')[0].reset()
                    $('#forms').attr('action',"{{route('transaksi.supplier.store')}}")
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
                    url : "{{ route('transaksi.supplier.destroy') }}",
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
                            text: xhr.responseJSON.text,
                        })
                    }
                })
            }
        })
    })
</script> 
@endsection