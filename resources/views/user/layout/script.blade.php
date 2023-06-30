 <!-- COMMON SCRIPTS -->
 <script src="{{ asset('teamplate/js/common_scripts.min.js') }}"></script>
 <script src="{{ asset('teamplate/js/common_func.js') }}"></script>
 {{-- sweetalert2 --}}
 <script src="{{ asset('teamplate/js/sweetalert2.all.js') }}"></script>
 {{-- bootstrap --}}
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
 <script>
     const user_btn = $("#user-bot .icon");
     const user_box = $("#user-bot .information");

     user_btn.click(() => {
         user_btn.toggleClass("expanded");
         setTimeout(() => {
             user_box.toggleClass("expanded");
         }, 100);
     });
 </script>
