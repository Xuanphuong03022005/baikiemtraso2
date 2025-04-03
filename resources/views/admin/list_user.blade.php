@extends('admin.master')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Status</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $value)
                    <tr class="odd gradeX  
                    @if($value->level == 1 )
                    bg-danger
                    @endif" align="center">
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>@if($value->level == 1 )
                            <p>Admin</p>
                            @else
                            <p>User</p>
                            @endif</td>
                        <td>
                            @if($value->deleted_at != "")
                            <p>Bị khoá</p>
                            @else
                            <p>Hoạt động</p>
                            @endif
                        </td>
                        @if($value->level != 1 )
                        <td class="center"> 
                            <form action="{{ route('admin.user.destroy', $value->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button><i class="fa fa-trash-o  fa-fw"></i></button>
                        </form></td>
                        @else
                        <td></td>
                        @endif
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