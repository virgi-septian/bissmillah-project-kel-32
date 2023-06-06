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
                $('#dataTable2').DataTable().destroy(),
                loaddataPermission(),
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
</script> 