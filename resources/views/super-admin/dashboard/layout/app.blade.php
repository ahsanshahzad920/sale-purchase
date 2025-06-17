<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- jQuery UI CSS -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
    <!-- jQuery UI JS -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" />

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />

    <!-- Dynamically set favicon using the site logo -->
    <link rel="icon" type="image/png" href="" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css"  /> --}}

    <!-- Template Stylesheet -->
    {{-- <link href="{{ asset('back/assets/dasheets/css/style.css') }}" rel="stylesheet" /> --}}
    <link href="{{ asset('back/assets/dasheets/css/crm.css') }}" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    {{-- <link href="{{ asset('back/assets/css/styles.css') }}" rel="stylesheet" /> --}}
    {{-- <link href="{{ asset('back/assets/js/simplebar/css/simplebar.css') }}" rel="stylesheet" /> --}}


    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" crossorigin="anonymous">
    </script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- simple notify  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.css" />

    @yield('style')

    {{-- <title>{{ env('APP_NAME') }} | @yield('title')</title> --}}
    <title>CORECRM | @yield('title')</title>
    <style>
        .page-link {
            color: black;
        }

        .dt-buttons {
            display: none;
        }

        .cursor-p {
            cursor: pointer;
        }

        .dataTables_filter {
            display: none;
        }
    </style>
    <style>
        .orange-bg {
            background: #FE9F44;
        }

        .orange-bg-light {
            background: #FFC6A4;
        }

        .btn-orange-bg {
            background: #FE9F44;
            color: white;
        }

        .btn-orange-bg-light {
            background: #FFC6A4;

        }

        .btn-orange-bg:hover {
            background: #FFC6A4;
            color: white;
        }

        .btn-orange-bg-light:hover {
            background: #FE9F44;
        }

        .darkblue-bg {
            background: #092C4C;
        }

        .darkgreen-bg {
            background: #0E9384;
        }

        .normalblue-bg {
            background: #155EEF;
        }
    </style>
</head>

<body>


    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->

        <!-- Spinner End -->

        <!-- Sidebar Start -->
        @include('super-admin.dashboard.layout.sidebar-2')

        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="contents">
            <!-- Navbar Start -->
            @include('super-admin.dashboard.layout.navbar-2')
            <!-- Navbar End -->

            @yield('content')

            @php
                $links = \App\Models\Setting::first() ?? [];
            @endphp

            <div class="container-fluid px-4 mb-5 main-footer">
                <div class="bg-footer p-3 bg-white">
                    <div class="row align-items-center">
                        <div class="col-md-6 align-items-center align-middle">
                            <p class="fw-bold m-0">
                                {{$links->footer ?? 'ITSOL - Inventory and Stock Management'}}
                            </p>
                        </div>
                        <div class="col-md-6 text-end d-flex gap-3 align-items-center justify-content-end">
                            <a href="{{ $links->linkedin ?? '' }}" target="_blank" class="text-decoration-none">

                                <i class="fa-brands fa-linkedin-in darkorange-txt fs-3"></i>
                            </a>
                            <a href="{{ $links->fb ?? '' }}" target="_blank" class="text-decoration-none">
                                <i class="fa-brands fa-facebook-f fs-4 darkorange-txt"></i>
                            </a>
                            <a href="{{ $links->twitch ?? '' }}" target="_blank" class="text-decoration-none">

                                <i class="fa-brands fa-twitch fs-4 darkorange-txt"></i>
                            </a>
                            <a href="{{ $links->twitter ?? '' }}" target="_blank" class="text-decoration-none">

                                <i class="fa-brands fa-twitter fs-4 darkorange-txt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            {{-- @include('back.layout.footer') --}}

        </div>
        <!-- Recent Sales End -->


    </div>


    @yield('modal')

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"> --}}
    </script>
    <script src="{{ asset('back/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('back/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('back/assets/js/datatables-simple-demo.js') }}"></script>
    <script src="{{ asset('back/assets/js/simplebar/js/simplebar.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <!-- Template Javascript -->
    <script src="{{ asset('back/assets/dasheets/js/main.js') }}"></script>
    <script src="{{ asset('back/assets/dasheets/js/chart.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.min.js"></script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script> --}}

    <script>
        function customAlert(status,title, message) {
            new Notify({
                status: status,
                title: title,
                text: message,
                effect: 'fade',
                speed: 300,
                customClass: '',
                customIcon: '',
                showIcon: true,
                showCloseButton: true,
                autoclose: true,
                autotimeout: 3000,
                notificationsGap: null,
                notificationsPadding: null,
                type: 'outline',
                position: 'right top',
                customWrapper: '',
            });
        }
    </script>


    @if (session('success'))
        <script>
            new Notify({
                status: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                effect: 'fade',
                speed: 300,
                customClass: '',
                customIcon: '',
                showIcon: true,
                showCloseButton: true,
                autoclose: true,
                autotimeout: 3000,
                notificationsGap: null,
                notificationsPadding: null,
                type: 'outline',
                position: 'right top',
                customWrapper: '',
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            new Notify({
                status: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
                effect: 'fade',
                speed: 300,
                customClass: '',
                customIcon: '',
                showIcon: true,
                showCloseButton: true,
                autoclose: true,
                autotimeout: 10000,
                notificationsGap: null,
                notificationsPadding: null,
                type: 'outline',
                position: 'right top',
                customWrapper: '',
            });
        </script>
    @endif

    @if (session('info'))
        <script>
            new Notify({
                status: 'info',
                title: 'Success',
                text: '{{ session('info') }}',
                effect: 'fade',
                speed: 300,
                customClass: '',
                customIcon: '',
                showIcon: true,
                showCloseButton: true,
                autoclose: true,
                autotimeout: 3000,
                notificationsGap: null,
                notificationsPadding: null,
                type: 'outline',
                position: 'right top',
                customWrapper: '',
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            @foreach ($errors->all() as $error)
                new Notify({
                    status: 'error',
                    title: 'Error',
                    text: '{{ $error }}',
                    effect: 'fade',
                    speed: 300,
                    customClass: '',
                    customIcon: '',
                    showIcon: true,
                    showCloseButton: true,
                    autoclose: true,
                    autotimeout: 8000,
                    notificationsGap: null,
                    notificationsPadding: null,
                    type: 'outline',
                    position: 'right top',
                    customWrapper: '',
                });
            @endforeach
        </script>
    @endif

    @yield('scripts')


</body>

</html>
