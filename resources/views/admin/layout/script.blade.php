<!-- Jquery Core Js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="{{ asset('/teamplate/admin/assets/bundles/libscripts.bundle.js') }}"></script>
<!-- Plugin Js-->
<script src="{{ asset('/teamplate/admin/assets/bundles/dataTables.bundle.js') }}"></script>
<!-- Jquery Page Js -->
<script src="{{ asset('/teamplate/admin/js/template.js') }}"></script>
<!-- custome Js-->
<script src="{{ asset('/teamplate/admin/js/main.js') }}"></script>
<!-- toastr message-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!--sweetalert2 -->
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>

@yield('script')
