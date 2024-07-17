 <!-- COMMON SCRIPTS -->
 <script src="{{ asset('teamplate/js/common_scripts.min.js') }}"></script>
 <script src="{{ asset('teamplate/js/common_func.js') }}"></script>
 <!-- Home -->
 <script src="{{ asset('teamplate/js/wizard/wizard_func.js') }}"></script>
 <script src="{{ asset('teamplate/js/slider.js') }}"></script>
 <script src="{{ asset('teamplate/js/sticky_sidebar.min.js') }}"></script>
 {{-- thanh-toan --}}
 <script src="{{ asset('teamplate/js/shop_order_func.js') }}"></script>
 {{-- gio-hang --}}
 <script src="{{ asset('teamplate/js/specific_shop.js') }}"></script>
 {{-- /thuc-don --}}
 <script src="{{ asset('teamplate/js/RangeSlider/jQuery.UI.js') }}"></script>
 {{-- sweetalert2 --}}
 <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
 {{-- bootstrap --}}
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
 <script type="text/javascript">
     const user_btn = $("#user-bot .icon");
     const user_box = $("#user-bot .information");

     user_btn.click(() => {
         user_btn.toggleClass("expanded");
         setTimeout(() => {
             user_box.toggleClass("expanded");
         }, 100);
     });
 </script>
