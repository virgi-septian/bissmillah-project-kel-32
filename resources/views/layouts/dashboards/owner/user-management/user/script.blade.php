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
                $('#id_edit').val(res.user.id);
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
        $('#editUser').attr('hidden', true);
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
                    $('#btn-tutup').click(),
                    $('#dataTable').DataTable().destroy(),
                    loaddata(),
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