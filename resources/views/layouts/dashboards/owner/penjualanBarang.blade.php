@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header mb-3 border-bottom border-3"><h4>Penjualan Barang</h4>
    </div>
    <form action="{{ route('transaksi.penjualan.store') }}" id="forms" method="POST">
    @csrf
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Basic Layout -->
            <div class="row">
                <div class="col-xl-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Data Costumer</h5>
                    </div>
                    <div>
                        <hr style="border: 1px solid rgb(8, 4, 255);">
                    </div>
                    <div class="card-body">
                        <form action="" id="sample_form" method="POST" >
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="nama_passiens">Nama Pasien</label>
                            <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"
                                ><i class="bx bx-user"></i
                            ></span>
                            <input
                                type="text"
                                class="form-control"
                                id="nama_passiens"
                                name="nama_passiens"
                                placeholder="Nama Lengkap"
                                aria-label="Nama Lengkap"
                                aria-describedby="basic-icon-default-fullname2"
                            />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="telp_pasiens">No. Telepon</label>
                            <div class="input-group input-group-merge">
                            <span id="basic-icon-default-phone2" class="input-group-text"
                                ><i class="bx bx-phone"></i
                            ></span>
                            <input
                                type="text"
                                maxlength="12"
                                id="telp_pasiens"
                                onkeypress="return number(event)"
                                name="telp_pasiens"
                                class="form-control phone-mask"
                                placeholder="658 799 8941"
                                aria-label="658 799 8941"
                                aria-describedby="basic-icon-default-phone2"
                            />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="alamat_pasiens">Alamat</label>
                            <div class="input-group input-group-merge">
                            <textarea
                                id="alamat_pasiens"
                                name="alamat_pasiens"
                                class="form-control"
                                placeholder="Jl. Kab.."
                                aria-describedby="basic-icon-default-message2"
                            ></textarea>
                            </div>
                        </div>
                        <div>
                            <hr style="border: 1px solid rgb(8, 4, 255);">
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>No. Resep</h6>
                                    <input type="text" id="resep" name="resep" class="form-control" placeholder="Isi jika ada resep">
                                </div>
                                <div class="col-md-6">
                                    <h6>Pengirim</h6>
                                    <input type="text" id="pengirim" name="pengirim" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Data Pembelian</h5>
                        </div>
                        <div>
                            <hr style="border: 1px solid rgb(8, 4, 255);">
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-company">Obat</label>
                                    <select class="form-select" data-width="100%" name="obat" id="obat">
                                        <option selected>Pilih Obat</option>
                                        @foreach($obat as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option> 
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="stock">Stock Tersedia</label>
                                    <input type="text" name="stock" id="stock" readonly class="form-control" id="basic-default-company"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="no">No. Kwitansi</label>
                                    <input type="text" name="no" id="no" readonly class="form-control" value="{{ $nomer }}" id="basic-default-company"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="tanggal">Tanggal</label>
                                    <input type="text" name="tanggal" id="tanggal" value="{{ $tanggals }}" readonly class="form-control" id="basic-default-company"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="qyt">Jumlah Pembelian</label>
                                    <div class="btn-group" role="group" aria-label="basic mixed styles example">
                                        <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-dash-lg"></i></button>
                                        <input type="text" name="qyt" id="qyt" class="form-control">
                                        <button type="button" class="btn btn-success btn-sm"><i class="bi bi-plus-lg"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="harga">Harga @satuan</label>
                                    <input type="text" id="harga" name="harga" disabled class="form-control" onkeypress="return number(event)" name="" id="basic-default-company"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="diskon">Diskon</label>
                                    <input type="text" readonly class="form-control" onkeypress="return number(event)" name="diskon" id="diskon"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="total">Total Harga</label>
                                    <input type="text" readonly class="form-control" onkeypress="return number(event)" name="total" id="total"/>
                                </div>
                            </div>
                        </div>
                        <div>
                            <hr style="border: 1px solid rgb(8, 4, 255);">
                        </div>
                        <div>
                            <button type="sumbit" id="tambah" name="tambah" class="btn btn-success"><i class="bi bi-save"></i> Simpan</button>
                            </form>
                            <button type="sumbit" id="buka" name="buka" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah obat</button>
                        </div>
                        <div class="card card-danger table-responsive mt-5">
                            <table class="table table-bordered table-striped table-sm" id="table1">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Obat</th>
                                        <th>QYT</th>
                                        <th>Harga</th>
                                        <th>Total Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                
                            </div>
                            <div class="col-3">
                                
                            </div>
                            <div class="col-3">
                                
                            </div>
                            <div class="col-3">
                                <form action="" method="POST">
                                    @csrf
                                    <input type="text" class="form-control" >
                                </form>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>    
</div>
<script type="text/javascript" src="{{ asset('js/jquery-3.5.1.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        loaddata()
        $('#obat').select2();
    });


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
                console.log(res);
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
                            text: 'Gagal Menghapus',
                        })
                    }
                })
            }
        })
    })
</script> 
@endsection