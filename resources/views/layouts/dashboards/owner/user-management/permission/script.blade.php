<script type="text/javascript">
    $(document).ready(function() {
        loaddataPermission()
    });

    function loaddataPermission() {
        $('#dataTable2').DataTable({
            serverside: true,
            processing: true,
            ajax: {
                url : "{{ route('setting.permission-management') }}",
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

    function resetFormPermission() {
        $('#name_permission').val('');
        $('#display_name').val('');
        $('#description').val('');
        $('input[name="hakAkses[]"]').prop('checked', false);
    }

    $(document).on('click', '#tambahPermission', function () {
        var selectedHakAkses = [];
        $('.hakAkses:checked').each(function() {
            selectedHakAkses.push($(this).val());
        });
        $.ajax({
            type: "POST",
            url: "{{ route('setting.permission-management.store') }}",
            data: {
                _token: "{{ csrf_token() }}",
                name: $('#name_permission').val(),
                display_name: $('#display_name').val(),
                description: $('#description').val(),
                hakAkses: selectedHakAkses,
            },
            success: function (res) {
                resetFormPermission(),
                $('#dataTable2').DataTable().ajax.reload()
                iziToast.success({
                title: 'OK',
                message: res.text,
            })
            },
            error: function (xhr) {
                console.log(xhr);
                iziToast.warning({
                title: 'Gagal',
                message: xhr.responseJSON.text,
            });
            }
        });
    });

    $(document).on('click', '.hapus_permissionmanagement', function () {
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
                    url : "{{ route('setting.permission.destroy') }}",
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