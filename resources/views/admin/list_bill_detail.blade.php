@extends('admin.master')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bill
                    <small>Detail</small>
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
                        <th>Id_Bill</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>quantity</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bill as $key => $value)
                    <tr class="even gradeC" align="center">
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->id_bill }}</td>
                        <td>{{ $value->product_name }}</td>
                        <td>{{ number_format($value->unit_price) }}VNĐ</td>
                        <td>{{ $value->quantity }}</td>
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
