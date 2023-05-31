@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header mb-3 border-bottom border-3"><h4>Supplier</h4>
        
    </div>
    <div class="card-body">
        <div class="row justify-content-beetwen">
            <div class="col-md-12">
                <table class="table align-middle" id="dataTable" style="width: 100%">
                    <thead>
                        <th>No.</th>
                        <th>name</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
                <br>
            </div>
            
        </div>
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="row">
                    <div class="col mb-3">
                    <label for="name" class="form-label">Username</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control"
                        placeholder="Name"
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
                <div class="mb-3 form-password-toggle">
                    <div class="d-flex justify-content-between">
                      <label class="form-label" for="password">Password</label>
                    </div>
                    <div class="input-group input-group-merge">
                      <input
                        type="password"
                        id="password"
                        class="form-control"
                        name="password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password"
                      />
                      <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                  </div>
            </div>
            <div class="col-md-6">
                <div class="modal-body">
                    <h5>Pilih Role</h5>
                    <div class="form-check">
                        <input type="radio" name="role" id="role" class="role" value="owner">
                        <label for="role">Super Admin</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="role" id="role" class="role" value="gudang">
                        <label for="role">Admin Gudang</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="role" id="role" class="role" value="kasir">
                        <label for="role">Admin Kasir</label>
                    </div>
                </div>
                <!-- Button to trigger modal -->
                <center>
                    <button type="submit" id="simpanuser" class="btn btn-primary">Simpan</button>
                </center>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="modalCenterTitle">Role : <label for="" id="labelRole"></label></h5>
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
        ></button>
        </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                    <label for="names" class="form-label">Username</label>
                    <input
                        type="text"
                        id="names"
                        name="names"
                        class="form-control"
                        placeholder="Names"
                    />
                    </div>
                </div>
                
                <div class="row">
                    <div class="col mb-3">
                        <label for="emails" class="form-label">Email</label>
                        <input
                            type="text"
                            id="emails"
                            name="emails"
                            class="form-control"
                            placeholder="xxxx@xxx.xx"
                        />
                    </div>
                </div>
                
                <div id="formRole" hidden>
                    <h5>Pilih Role</h5>
                    <div class="form-check">
                        <input type="radio" name="roles" id="roles" class="roles" value="owner">
                        <label for="roles">Super Admin</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="roles" id="roles" class="roles" value="gudang">
                        <label for="roles">Admin Gudang</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="roles" id="roles" class="roles" value="kasir">
                        <label for="roles">Admin Kasir</label>
                    </div>
                </div>
            </div>

            <!-- Button to trigger modal -->


            <div class="modal-footer">
                <button type="button" id="btn-tutup" name="batal" class="btn btn-outline-danger" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" id="editUser" class="btn btn-primary">Edit</button>
                <button type="submit" disabled id="simpaneditUser" class="btn btn-primary">Simpan Edit</button>
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
                url : "{{ route('setting.usermanagement') }}",
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
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
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

    $(document).on('click', '#simpanuser', function () {
         $.ajax({
            url : "{{ route('setting.usermanagement.store') }}",
            type: 'post',
            data: {
                _token: "{{ csrf_token() }}",
                name: $('#name').val(),
                email: $('#email').val(),
                password: $('#password').val(),
                role: $('.role:checked').val(),
            },
            success: function (res) {
                $('#dataTable').DataTable().destroy(),
                loaddata(),
                iziToast.success({
                title: 'OK',
                message: res.text,
            })
            },
            error: function (xhr) {
                iziToast.warning({
                title: 'Gagal',
                message: xhr.responseJSON.text,
            });
            }
        })
    })

    $(document).on('click', '.edit', function() {
        $.ajax({
            url : "{{ route('setting.usermanagement.get-role') }}",
            type: 'post',
            data: {
                _token: "{{ csrf_token() }}",
                id: $(this).attr('id'),
            },
            success: function(res) {
                $('#names').val(res.user.name);
                $('#emails').val(res.user.email);
                $('#labelRole').text(res.roles);
            },
            error: function(xhr) {
                console.log(xhr);
            },
        })
    })

    $(document).on('click', '#editUser', function() {
        $('#simpaneditUser').attr('disabled', false);
        $('#names').attr('readonly', true);
        $('#emails').attr('readonly', true);
        $('#formRole').attr('hidden', false);
        
        $(document).on('click', '#simpaneditUser', function() {
            $.ajax({
                url: "{{ route('setting.usermanagement.update') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: $(this).attr('id'),
                    name: $('#names').val(),
                    email: $('#emails').val(),
                    role: $('.roles:checked').val(),
                },
                success: function(res) {
                    iziToast.success({
                    title: 'OK',
                    message: res.text,
                })
                },
                error: function(xhr) {
                    iziToast.warning({
                    title: 'Gagal',
                    message: xhr.responseJSON.text,
                });
                }
            })
        })
    })
</script> 
@endsection
