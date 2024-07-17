@extends('admin.layout.main')

@section('content')
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0"> {{ $title }}</h3>
                        @foreach ($abouts as $about)
                            <div class="col-auto d-flex w-sm-100">
                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal">
                                    <a class="btn btn-primary btn-sm" href="/admin/abouts/edit/{{ $about->id }}">
                                        <i class="icofont-edit text-success"></i>
                                    </a>
                                </button>
                            </div>
                    </div>
                </div>
            </div>
            {{-- List --}}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="card-body  d-flex teacher-fulldeatil">
                                <div class="profile-teacher pe-xl-4 pe-md-2 pe-sm-4 pe-0 text-center mx-auto">
                                    <img src="{{ $about->thumb }}" alt="errorimg" style="width: 400px"
                                        class="xl rounded-circle img-thumbnail shadow-sm">
                                </div>
                                <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                                    <p class="mt-2 small">{!! $about->description !!}</p>
                                    <div class="row g-2 pt-2">
                                        <div class="col-xl-5">
                                            <div class="d-flex align-items-center">
                                                <i class="icofont-ui-touch-phone"></i>
                                                <span class="ms-2 small">{{ $about->phone }}</span>
                                            </div>
                                        </div>
                                        <div class="col-xl-5 mb-2">
                                            <div class="d-flex align-items-center">
                                                <i class="icofont-email"></i>
                                                <span class="ms-2 small">{{ $about->email }}</span>
                                            </div>
                                        </div>
                                        <div class="col-xl-5">
                                            <div class="d-flex align-items-center">
                                                <i class="icofont-google-map"></i>
                                                <span class="ms-2 small">{!! $about->address !!}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 add_bottom_25">
                            <iframe src="{{ $about->map }}" class="map_contact" allowfullscreen=""
                                loading="lazy"></iframe>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
