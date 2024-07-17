<!DOCTYPE html>
<html lang="vi">

<head>
    @include('user.layout.head')
    @yield('head')
</head>

<body>
    <div id="preloader" style="display: none;">
        <div data-loader="circle-side" style="display: none;"></div>
    </div>
    @include('user.layout.header')
    <!-- main -->
    @yield('content')
    <!-- main -->
    @if (!empty(Auth::user()))
        @include('user.layout.userbot')
    @endif
    @include('user.layout.footer')
    @include('user.layout.script')
    @yield('script')
</body>

</html>
