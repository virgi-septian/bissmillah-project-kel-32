<script type="text/javascript">
    $(document).ready(function() {
        loadDataRole();
        indexRole();
    });

    function indexRole() {
        $(document).on('click','#navs-pills-top-role',function () { 
            $.ajax({
                type: "get",
                url : "{{ route('setting.role-management.reload') }}",
                success: function (res) {
                    $('#checkbox').empty(); 
                    var html = '<h5>Set Permission</h5>';
                    html += '<div class="row mt-5 mb-5">';
                    $.each(res.data_permission, function(i, ceks) {
                        html += '<div class="col-md-4">';
                        html += '<div class="form-check mt-3">';
                        html += '<input class="form-check-input roleAkses" disabled name="roleAkses[]" value="'+ ceks.id + '" type="checkbox" id="'+ ceks.name +'" />';
                        html += '<label class="form-check-label" for="'+ ceks.name +'">'+ ceks.name +'</label>';
                        html += '</div>';
                        html += '</div>';
                    });
                    html += '</div>';
                    $('#checkbox').append(html);
                }
            });
        });
    }

    function loadDataRole() {
        $('#dataTableRole').DataTable({
            serverside: true,
            processing: true,
            ajax: {
                url : "{{ route('setting.role-management') }}",
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
                { data: 'display_name', name: 'display_name' },
                { data: 'description', name: 'description' },
                { data: 'aksi', name: 'aksi', orderable: false },
            ],
        });
    }

    function hiddenFormRole() {
        $('#tambahRole').attr('hidden', true);
        $('#batalRole').attr('hidden', false);
        $('#simpanRole').attr('hidden', false);
        $('#name_role').attr('disabled', false);
        $('#display_name_role').attr('disabled', false);
        $('#description_role').attr('disabled', false);
        $('.roleAkses').removeAttr('disabled');
    }

    function showFormRole() {
        $('#tambahRole').attr('hidden', false);
        $('#batalRole').attr('hidden', true);
        $('#simpanRole').attr('hidden', true);
        $('#name_role').attr('disabled', true);
        $('#display_name_role').attr('disabled', true);
        $('#description_role').attr('disabled', true);
        $('.roleAkses').prop('disabled', true);
    }

    function resetFormRole() {
        $('#name_role').val('');
        $('#display_name_role').val('');
        $('#description_role').val('');
        $('input[name="roleAkses[]"]').prop('checked', false);
        showFormRole();
    }

    $(document).off('click', '#tambahRole').on('click', '#tambahRole', function () {
        $('#simpanRole').text('Simpan');
        
        hiddenFormRole();
        $(document).off('click', '#batalRole', function () {
        });
        $(document).off('click', '#simpanRole').on('click', '#simpanRole', function () {
            var selectedRoleAkses = [];
            $('.roleAkses:checked').each(function() {
                selectedRoleAkses.push($(this).val());
            });
            $('#spinner').attr('hidden', false);
            if( $('#simpanRole').text() == "Simpan"){
                $.ajax({
                    type: "POST",
                    url: "{{ route('setting.role-management.store') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        name: $('#name_role').val(),
                        display_name: $('#display_name_role').val(),
                        description: $('#description_role').val(),
                        roleAkses: selectedRoleAkses,
                    },
                    success: function (res) {
                        $("#spinner").attr('hidden', true);
                        resetFormRole(),
                        $('#dataTable').DataTable().ajax.reload()
                        $('#dataTable2').DataTable().ajax.reload()
                        $('#dataTableRole').DataTable().ajax.reload()
                        iziToast.success({
                        title: 'OK',
                        message: res.text,
                    })
                    },
                    error: function (xhr) {
                        $("#spinner").attr('hidden', true);
                        console.log(xhr);
                        iziToast.warning({
                        title: 'Gagal',
                        message: xhr.responseJSON.text,
                    });
                    }
                });
            }
        });
    });
    $(document).on('click', '#batalRole', function () {
        showFormRole();
        resetFormRole();
    });
    $(document).on('click', '.edit_role_management', function () {
        hiddenFormRole();
        $('#simpanRole').text("Edit Role");

        // Menghapus event handler untuk klik pada tombol batalRole
        $(document).off('click', '#batalRole');
        
        let id = $(this).attr('id');

        $.ajax({
            type: 'post',
            url: "{{ route('setting.role-management.info-role') }}",
            data: {
                id: id,
                _token: "{{ csrf_token() }}",
            },
            success: function (res) {
                $('#checkbox').empty(); 
                var html = '<h5>Set Permission</h5>';
                html += '<div class="row mt-5 mb-5">';
                $.each(res.cek, function(i, ceks) {
                    html += '<div class="col-md-4">';
                    html += '<div class="form-check mt-3">';
                    html += '<input class="form-check-input roleAkses" name="roleAkses[]" value="'+ ceks.id + '" type="checkbox" id="'+ ceks.name +'" />';
                    html += '<label class="form-check-label" for="'+ ceks.name +'">'+ ceks.name +'</label>';
                    html += '</div>';
                    html += '</div>';
                });
                html += '</div>';
                $('#checkbox').append(html);

                $('#id_edit_form_role').val(res.role.id);
                $('#name_role').val(res.role.name);
                $('#display_name_role').val(res.role.display_name);
                $('#description_role').val(res.role.description);
                var reset = $('input[name="roleAkses[]"]').prop('checked', false);
                var tandai = $('input[name="roleAkses[]"]').map(function(){
                    for (let index = 0; index < res.permission.length; index++) {
                        if ($(this).val() == res.permission[index].id){
                            return $(this).prop('checked', true);
                        }
                    }
                });
            },
            error: function (xhr) {
                console.log(xhr);
            }
        });
        $(document).off('click', '#simpanRole').on('click', '#simpanRole', function () {
            var selectedRoleAkses = [];
            $('.roleAkses:checked').each(function() {
                selectedRoleAkses.push($(this).val());
            });
            if($('#simpanRole').text() == "Edit Role"){
                $.ajax({
                    type: "POST",
                    url: "{{ route('setting.role-management.update') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: $('#id_edit_form_role').val(),
                        name: $('#name_role').val(),
                        display_name: $('#display_name_role').val(),
                        description: $('#description_role').val(),
                        roleAkses: selectedRoleAkses,
                    },
                    success: function (res) {
                        
                        $("#spinner").attr('hidden', true);
                        resetFormRole(),
                        $('#dataTable').DataTable().ajax.reload()
                        $('#dataTable2').DataTable().ajax.reload()
                        $('#dataTableRole').DataTable().ajax.reload()
                        iziToast.success({
                        title: 'OK',
                        message: res.text,
                    })
                    },
                    error: function (xhr) {
                        $("#spinner").attr('hidden', true);
                        console.log(xhr);
                        iziToast.warning({
                        title: 'Gagal',
                        message: xhr.responseJSON.text,
                    });
                    }
                });
            }
        });
    });
</script> 