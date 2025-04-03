@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
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
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $key => $value)
                    <tr class="odd gradeX" align="center">
                        <td><img src="{{asset('storage/images/'.$value->image) }}" height="50px" width="50px"/></td>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->description }}</td>
                        <td class="center">
                            <form action="{{ route('admin.category.delete', $value->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button><i class="fa fa-trash-o  fa-fw"></i></button>
                            </form>
                        </td>
                       
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('admin.category.edit', $value->id) }}">Edit</a></td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection