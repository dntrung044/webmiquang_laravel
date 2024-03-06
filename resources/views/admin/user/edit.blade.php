@section('head')
<link rel="stylesheet" href="{{ asset('/teamplate/admin/assets/css/select2.min.css') }}">
@endsection
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

            <div class="modal-body">
                <div class="deadline-form">
                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="form-label">Phân quyền</label>
                                <select class="form-select js-example-basic-multiple select2_init" name="role_id[]" multiple="multiple">
                                    <option value="" > Chọn danh mục </option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"
                                            {{ $rolesOfUser->contains('id',  $role->id) ? 'selected' : 'd' }}>
                                            {{ $role->name }}  ( {{ $role->description }} )
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-3">
                            <label class="form-label">Trạng thái</label>
                            <div>
                                <input type="radio" id="active" value="1" name="active"
                                    {{ $users->active == 1 ? 'checked="' : '' }}>
                                <label for="active">Hoạt động</label>
                            </div>
                            <div>
                                <input type="radio" id="no_active" value="0" name="active"
                                    {{ $users->active == 0 ? 'checked="' : '' }}>
                                <label for="no_active">Khóa</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"><a href="{{ route('members') }}">Hủy</a></button>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
<script src="{{ asset('/teamplate/admin/js/select2.min.js') }}"></script>
<script>
    $('select2_init').select2({
        'placeholder':'Chọn vai trò'
    })
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
@endsection
