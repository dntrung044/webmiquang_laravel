@extends('admin.layout.main')
@section('content')
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0"> {{ $title }}</h3>
                        <div class="col-auto d-flex w-sm-100">
                            <button type="button" class="btn btn-dark btn-set-task w-sm-100" data-bs-toggle="modal"
                                data-bs-target="#addProduct" data-whatever="@addProduct">
                                <i class="icofont-plus-circle me-2 fs-6"></i>Thêm món ăn
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- List Product -->
            @include('admin.products.list')
            {!! $products->links() !!}
        </div>
    </div>

    @include('sweetalert::alert')
    @include('admin.products.add')
    @include('admin.products.detail')
    {{-- @include('admin.products.edit') --}}
@endsection
@section('footer')
{{-- <script>
    // project data table
    $(document).ready(function() {
        $('#myProjectTable')
        .addClass( 'nowrap' )
        .dataTable( {
            responsive: true,
            columnDefs: [
                { targets: [-1, -3], className: 'dt-body-right' }
            ]
        });
    });
    $('.table').dataTable({
      aaSorting: [[0, 'DESC']]
    });
</script> --}}
<script type="text/javascript">
        $(document).ready(function () {
            $('#add_product').submit(function(e){
                e.preventDefault();
                $.ajax({
                    url : '{{url('/admin/products/add')}}',
                    method: "POST",
                    data: {
                        name: $('#name').val(),
                        description: $('#description').val(),
                        content: $('#content').val(),
                        cat_id: $('#cat_id').val(),
                        price: $('#price').val(),
                        price_sale: $('#price_sale').val(),
                        active: $('#active').val(),
                        thumb: $('#thumb').val(),
                        _token = $('input[name="_token"]').val();
                    },
                    success: function(response) {
                        toastr.success(response.message)
                        $('#addProduct').modal('hide');

                        // swal({
                        //     title:'Thông báo',
                        //     text: response.success,
                        //     icon: 'success'
                        // })
                        // console.log(response.data)
                        // $('tbody').prepend('<tr><td id="'+response.data.id+'">'+response.data.id+'
                        //     </td><td id="name-'+response.data.id+'">'+response.data.name+'</td><td id="description-'+response.data.id+'">'+response.data.description+'</td><td id="content-'+response.data.id+'">'+response.data.content+'</td><td id="cat_id-'+response.data.id+'">'+response.data.cat_id+'</td><td id="price-'+response.data.id+'">'+response.data.price+'</td><td><button data-url="{{asset('')}}studentajax/'+response.data.id+'"​ type="button" data-target="#show" data-toggle="modal" class="btn btn-info btn-show">Detail</button><button style="margin-left: 5px;" data-url="{{asset('')}}studentajax/'+response.data.id+'"​ type="button" data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Edit</button><button style="margin-left: 5px;" data-url="{{asset('')}}studentajax/'+response.data.id+'"​ type="button" data-target="#delete" data-toggle="modal" class="btn btn-danger btn-delete">Delete</button></td></tr>');
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        //xử lý lỗi tại đây
                    }
                })
            })

            $('.btn-show').click(function(){
                var url = $(this).attr('data-url');
                $.ajax({
                    type: 'get',
                    url: url,
                    success: function(response) {
                        console.log(response)

                        $('h1#id').text(response.data.id)
                        $('h1#hoten').text(response.data.hoten)
                        $('h1#gioitinh').text(response.data.gioitinh)
                        $('h1#ngaysinh').text(response.data.ngaysinh)
                        $('h1#sdt').text(response.data.sdt)
                        $('h1#diachi').text(response.data.diachi)
                        $('h1#created_at').text(response.data.created_at)
                        $('h1#update_at').text(response.data.update_at)
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        //xử lý lỗi tại đây
                    }
                })
            })

            $('.btn-edit').click(function(e){
                $('#form-edit').modal('show');
                e.preventDefault();

                $.ajax({
                        type: 'get',
                        url : '{{url('/admin/products/edit')}}',
                        success: function (response) {
                            $('#name-edit').val(response.data.name);
                            $('#description-edit').val(response.data.description);
                            $('#content-edit').val(response.data.content);
                            $('#cat_id-edit').val(response.data.cat_id);
                            $('#price-edit').val(response.data.price);
                            $('#price_sale-edit').val(response.data.price_sale);
                            $('#active-edit').val(response.data.active);
                            $('#thumb-edit').val(response.data.thumb);
                        },
                        error: function (error) {

                        }
                    })
                })

            $('#form-edit').submit(function(e){
                e.preventDefault();
                var url=$(this).attr('data-url');

                $.ajax({
                    type: 'put',
                    url: url,
                    data: {
                        hoten: $('#hoten-edit').val(),
                        gioitinh: $('#gioitinh-edit').val(),
                        ngaysinh: $('#ngaysinh-edit').val(),
                        sdt: $('#sdt-edit').val(),
                        diachi: $('#diachi-edit').val(),
                    },
                    success: function(response) {
                        // console.log(response.studentid)
                        toastr.success(response.message)
                        $('#modal-edit').modal('hide');
                        $('#hoten-'+response.studentid).text(response.student.hoten)
                        $('#gioitinh-'+response.studentid).text(response.student.gioitinh)
                        $('#ngaysinh-'+response.studentid).text(response.student.ngaysinh)
                        $('#sdt-'+response.studentid).text(response.student.sdt)
                        $('#diachi-'+response.studentid).text(response.student.diachi)
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        //xử lý lỗi tại đây
                    }
                })
            })
        });
</script>
@endsection
