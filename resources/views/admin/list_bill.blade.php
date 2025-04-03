@extends('admin.master')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bill
                    <small>List</small>
                </h1>
                @if(Session::has('message'))
                <p class="text-danger">{{ Session::get('message') }}</p>
                @endif
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Payment</th>
                        <th>note</th>
                        <th>status</th>
                        <th>Deltai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bills as $key => $value)
                    <tr class="even gradeC" align="center">
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->user_name }}</td>
                        <td>{{ $value->date_order }}</td>
                        <td>{{ number_format($value->total) }}VNĐ</td>
                        <td>{{ $value->payment }}</td>
                        <td>{{ $value->note }}</td>
                        <td>
                            @switch( $value->status )
                            @case(0)
                            Đang giao
                            @break
                            @case(1)
                            Thành công
                            @break
                            @case(2)
                            Bị huỷ
                            @break
                            @default
                            @endswitch
                        </td>
                        <td><a href="{{ route('admin.bill.detai', $value->id) }}">detail</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
