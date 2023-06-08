<script type="text/javascript">
    $(document).ready(function() {
        loaddata();
        reloadUser();
        indexUser();
    });

    function reloadUser() 
    {
        $.ajax({
            type: "get",
            url : "{{ route('setting.usermanagement.reload') }}",
            success: function (res) {
                $('#radio').empty(); 
                var html = '<h5>Pilih Role</h5>';
                $.each(res.data_role, function(i, ceks) {
                    html += '<div class="col-md-4">';
                    html += '<div class="form-check">';
                    html += '<input class="form-check-input role" name="role" value="'+ ceks.id + '" type="radio" id="'+ ceks.display_name +'" />';
                    html += '<label class="form-check-label" for="'+ ceks.display_name +'">'+ ceks.display_name +'</label>';
                    html += '</div>';
                    html += '</div>';
                });
                $('#radio').append(html);
            }
        });
    }

    function indexUser() {
        $(document).on('click','#navs-pills-top-user',function () { 
            reloadUser();
        });
    }
    
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

    function resetForm() {
        $('#name').val('');
        $('#email').val('');
        $('#password').val('');
        $('input[name="role"]').prop('checked', false);
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
                resetForm(),
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
                $('#radio_modal').empty(); 
                var html = '<h5>Pilih Role</h5>';
                $.each(res.roles, function(i, ceks) {
                    html += '<div class="col-md-4">';
                    html += '<div class="form-check">';
                    html += '<input class="form-check-input roles" name="roles" value="'+ ceks.id + '" type="radio" id="'+ ceks.display_name +'" />';
                    html += '<label class="form-check-label" for="'+ ceks.display_name +'">'+ ceks.display_name +'</label>';
                    html += '</div>';
                    html += '</div>';
                });
                $('#radio_modal').append(html);
                $('#names').val(res.user.name);
                $('#emails').val(res.user.email);
                $('#labelRole').text(res.role_name);
                $('#id_edit').val(res.user.id);
                $(".roles").each(function() {
                    var value = $(this).val();
                    if (value == res.roles_check) {
                        $(this).prop("checked", true); 
                    }
                });
                $('#permit').empty();
                $.each(res.permit, function(i, nama) {
                    $('#permit').append("<li> " + nama.name + "</li>");
                })
                
            },
            error: function(xhr) {
                console.log(xhr);
            },
        })
    })

    $(document).on('click', '#simpaneditUser', function() {
        
        $.ajax({
            url: "{{ route('setting.usermanagement.update') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: $('#id_edit').val(),
                name: $('#names').val(),
                email: $('#emails').val(),
                role: $('.roles:checked').val(),
            },
            success: function(res) {
                resetForm(),
                $('#btn-tutup').click(),
                $('#dataTable').DataTable().ajax.reload()
                $('#dataTable2').DataTable().ajax.reload()
                $('#dataTableRole').DataTable().ajax.reload()
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

    $(document).on('click', '.hapus_usermanagement', function () {
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
                    url : "{{ route('setting.usermanagement.destroy') }}",
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
                                    $('#dataTable2').DataTable().ajax.reload()
                                    $('#dataTableRole').DataTable().ajax.reload()
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