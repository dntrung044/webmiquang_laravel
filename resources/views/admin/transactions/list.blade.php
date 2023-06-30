@extends('admin.layout.main')
@section('content')
    <!-- Body: Body -->
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0"> {{ $title }}</h3>
                    </div>
                </div>
            </div>
            <!-- Row end  -->
            {{-- List --}}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 50px">#</th>
                                        <th>Tên khách hàng </th>
                                        <th>Số điện thoại</th>
                                        <th>Email </th>
                                        <th>Ngày đặt hàng</th>
                                        <th>Tình trạng</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $key => $transaction)
                                        <tr>
                                            <td>{{ $transaction->id }}</td>
                                            <td>{{ $transaction->user->name }}</td>
                                            <td>{{ $transaction->user->phone }}</td>
                                            <td>{{ $transaction->user->email }}</td>
                                            <td>{{ $transaction->created_at }}</td>
                                            <td>
                                                @if ($transaction->status == "DEFAULT")
                                                <a href="{{ route('transaction.active', $transaction->id) }}">
                                                    <span class="badge bg-warning">Chưa giao hàng</span>
                                                </a>
                                                @elseif ($transaction->status == "DONE")
                                                   <span class="badge bg-success">Đã giao hàng</span>
                                                @elseif ($transaction->status == "CANCELLED")
                                                    <span class="badge bg-danger">Đã hủy</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-toggle="modal">
                                                        <a class="btn btn-primary btn-sm"
                                                            href="{{ route('detail.index', $transaction->id) }}">
                                                            <i class="icofont-eye-alt text-success"></i>
                                                        </a>
                                                    </button>
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-toggle="modal">
                                                        <a class="btn btn-info btn-sm"
                                                            href="{{ route('transactions.index', $transaction->id) }}?pdf=true">
                                                            <i class="fa fa-print text-warning"></i>
                                                        </a>
                                                    </button>

                                                    <button type="button" class="btn btn-outline-secondary deleterow">
                                                        <a href="#"
                                                            onclick="removeRow({{ $transaction->id }}, '/admin/transactions/destroy')">
                                                            <i class="icofont-ui-delete text-danger"></i>
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
            {!! $transactions->links() !!}

        </div>
    </div>

@endsection
