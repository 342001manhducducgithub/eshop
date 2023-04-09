@extends('layouts.admin')

@section('title')
   Lịch sử duyệt hàng
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Đơn đặt hàng đã duyệt
                            <a href="{{'orders'}}" class="btn btn-warning float-end">Trở lại</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Ngày</th>
                                    <th>Tracking Number</th>
                                    <th>Tổng giá</th>
                                    <th>Trạng thái</th>
                                    <th>Hoạt động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                                <tr>
                                    <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>
                                    <td>{{$item->tracking_no}}</td>
                                    <td>{{number_format($item->total_price,3)}}</td>
                                    <td>{{$item->status =='0' ? 'pending' : 'completed'}}</td>
                                    <td>
                                        <a href="{{url('admin/view-order/'.$item->id)}}" class="btn btn-primary">View</a>
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
@endsection
