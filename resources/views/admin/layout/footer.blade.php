<!-- Jquery Core Js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="{{ asset('/teamplate/admin/assets/bundles/libscripts.bundle.js') }}"></script>
<!-- Plugin Js-->
<script src="{{ asset('/teamplate/admin/assets/bundles/dataTables.bundle.js') }}"></script>
<!-- Jquery Page Js -->
<script src="{{ asset('/teamplate/admin/js/template.js') }}"></script>
<!-- Ajax Js-->
<script src="{{ asset('/teamplate/admin/js/main.js') }}"></script>
<!-- Databse table-->
<script>
    $(document).ready(function() {
        $('#myProjectTable').addClass( 'nowrap' ).dataTable( {
            paging: false,
            info: false,
            responsive: true,
            columnDefs: [
                { targets: [-1, -3], className: 'dt-body-right' }
            ]
        });
    });
   ;
</script>
<!-- toastr message-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!-- token ajax-->
<script type="text/javascript" charset="utf-8">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@yield('footer')
<!-- alert message-->
<script>
    @if(Session::has('message'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("{{ session('message') }}");
    @endif

    @if(Session::has('error'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.warning("{{ session('warning') }}");
    @endif
  </script>


