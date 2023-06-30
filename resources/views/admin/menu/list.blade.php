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
            <!-- Row end  -->
            {{-- List --}}
            <div class="row clearfix g-3">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 50px">#</th>
                                        <th>Tên danh mục</th>
                                        <th>Mô tả</th>
                                        <th>Hình ảnh</th>
                                        <th>Hiện thị</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($menus as $key => $menu)
                                        <tr>
                                            <td>{{ $menu->id }}</td>
                                            <td>{{ $menu->name }}</td>
                                            <td>{{ $menu->description }}</td>
                                            <td>
                                                <a href="{{ $menu->thumb }}" target="_blank">
                                                    <img src="{{ $menu->thumb }}" style="height:100px;" >
                                                </a>
                                            </td>
                                            <td>{!! \App\Helpers\Helper::active($menu->active) !!}</td>

                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal">
                                                        <a class="btn btn-primary btn-sm"
                                                        href="/admin/menus/edit/{{ $menu->id }}">
                                                        <i class="icofont-edit text-success"></i>
                                                        </a>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
