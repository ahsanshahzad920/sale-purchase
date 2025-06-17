<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CORE CRMS</title>
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <!-- bootstrap 5 css link here  -->
    <link rel="stylesheet" href="{{asset('super-admin/assets/css/bootstrap.min.css')}}">
    <!-- custom css link here  -->
    <link rel="stylesheet" href="{{asset('super-admin/assets/css/style.css')}}">
    <!-- responsive css here  -->
    <link rel="stylesheet" href="{{asset('super-admin/assets/css/responsive.css')}}">
    <!-- swiper slide css link here  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- aos scroll animation css link here  -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    {{-- simple notify  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.css" />


</head>

<body>

    @include('super-admin.layouts.header')

   @yield('content')

    <!-- footer aira start  -->
    @include('super-admin.layouts.footer')
    <!-- footer aira end -->




    <!-- botstrap 5 js  -->
    <script src="{{asset('super-admin/assets/js/bootstrap.bundle.min.js')}}"></script>
    <!-- swiper slider js link here  -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- aos animation link script  -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <!-- custom js link here  -->
    <script src="{{asset('super-admin/assets/js/main.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.min.js"></script>


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
           customAlert('success','Success','{{ session('success') }}');
        </script>
    @endif

    @if (session('error'))
        <script>
            customAlert('error','Error','{{ session('error') }}');
        </script>
    @endif

    @if (session('info'))
        <script>
            customAlert('info','Info','{{ session('info') }}');
        </script>
    @endif

    @if ($errors->any())
        <script>
            @foreach ($errors->all() as $error)
                customAlert('error','Error','{{ $error }}');
            @endforeach
        </script>
    @endif

    @stack('scripts')

</body>

</html>
