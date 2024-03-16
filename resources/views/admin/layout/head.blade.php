    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon-->
    <link rel="icon" href="favicon.png" type="image/x-icon">
    <title>
        @if( $title)
            {{ $title }}
        @else
             Quản lý
        @endif
    </title>
    <!-- plugin css file  -->
    <link rel="stylesheet" href="{{ asset('/teamplate/admin/assets/plugin/datatables/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/teamplate/admin/assets/plugin/datatables/dataTables.bootstrap5.min.css') }}">
    <!-- project css file  -->
    <link rel="stylesheet" href="{{ asset('/teamplate/admin/assets/css/my-task.style.min.css') }}">
    <!-- add css file  -->
    <link href="{{ asset('https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@yield('head')
