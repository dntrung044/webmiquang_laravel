@extends('admin.layout.main')

@section('content')
    <!-- Body: Body -->
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0"> {{ $title }}</h3>
                    </div>
                </div>
            </div>

            <!-- Add-->
            <div class="modal-body">
                <div class="deadline-form">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Quận/huyện: </label>
                                <select class="form-select choose district" name="district" id="district">
                                    <option value="">Chọn quận/huyện</option>
                                    @foreach ($districts as $d)
                                        <option value="{{ $d->name }}">{{ $d->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Phường/xã: </label>
                                <select class="form-select ward" name="ward" id="ward">
                                    <option value="">Chọn phường/xã</option>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Phí vận chuyển</label>
                                <input type="number" name="feeship" value="{{ old('feeship') }}"
                                    class="form-control feeship" placeholder="Phí vận chuyển">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('feeships.index') }}"><button type="button" class="btn btn-secondary">Hủy</button></a>
                            <button type="submit" class="btn btn-primary">Thêm Phí Ship</button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')

@endsection
@section('footer')
    <script>
      $(document).ready(function() {
        $('.choose').on('change',function() {
            var action = $(this).attr('id');
            var district_name = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';

            if(action =='district') {
                result = 'ward'
            }
            $.ajax({
                url : '{{url('/admin/feeships/add_address')}}',
                method : 'POST',
                data: {action:action, district_name:district_name, _token:_token},
                success:function(data) {
                    $('#'+result).html(data);
                }
            });
        });
      })
    </script>
    <script
@endsection
