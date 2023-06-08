<!DOCTYPE html>
<html class="no-js" lang="zxx">
    <script type="text/javascript">
        $(document).ready(function() {
            loadDataRole()
        });
    
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
    
        function resetFormRole() {
            $('#name_role').val('');
            $('#display_name_role').val('');
            $('#description_role').val('');
            $('input[name="roleAkses[]"]').prop('checked', false);
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
    
        $(document).off('click', '#tambahRole').on('click', '#tambahRole', function () {
            $('#simpanRole').text('Simpan');
            hiddenFormRole();
            var selectedRoleAkses = [];
            $('.roleAkses:checked').each(function() {
                selectedRoleAkses.push($(this).val());
            });
            $(document).off('click', '#batalRole').on('click', '#batalRole', function () {
                showFormRole();
                resetFormRole();
                var reset = $('input[name="roleAkses[]"]').prop('checked', false);
            });
            $(document).off('click', '#simpanRole').on('click', '#simpanRole', function () {
                $('#spinner').attr('hidden', false);
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
                
            });
        });
    
        $(document).on('click', '.edit_role_management', function () {
            console.log("test");
            hiddenFormRole();
            $('#simpanRole').text("Edit Role");
    
            // Menghapus event handler untuk klik pada tombol batalRole
            $(document).off('click', '#batalRole');
            $(document).on('click', '#batalRole', function () {
                showFormRole();
                resetFormRole();
            });
            let id = $(this).attr('id');
    
            $.ajax({
                type: 'post',
                url: "{{ route('setting.role-management.info-role') }}",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}",
                },
                success: function (res) {
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
        });
    </script> 
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>ShopGrids - Bootstrap 5 eCommerce HTML Template.</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets3/images/favicon.svg') }}" />

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ asset('assets3/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets3/css/LineIcons.3.0.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets3/css/tiny-slider.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets3/css/glightbox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets3/css/main.css') }}" />
    <link rel="stylesheet" href="{{asset('Bootstrap-Icon/node_modules/bootstrap-icons/font/bootstrap-icons.css')}}">

</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    @include('layouts.components2.header')
    <!-- End Header Area -->

    <!-- Start Hero Area -->
    @include('layouts.components2.heroarea')
    <!-- End Hero Area -->

    @yield('content')

    <!-- Start Shipping Info -->
    @include('layouts.components2.shipping')
    <!-- End Shipping Info -->

    <!-- Start Footer Area -->
    @include('layouts.components2.footer')
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="{{ asset('assets3/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets3/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets3/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets3/js/main.js') }}"></script>
    <script type="text/javascript">
        //========= Hero Slider 
        tns({
            container: '.hero-slider',
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 0,
            items: 1,
            nav: false,
            controls: true,
            controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
        });

        //======== Brand Slider
        tns({
            container: '.brands-logo-carousel',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 15,
            nav: false,
            controls: false,
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 3,
                },
                768: {
                    items: 5,
                },
                992: {
                    items: 6,
                }
            }
        });
    </script>
</body>

</html>
