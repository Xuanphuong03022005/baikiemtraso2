@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>Add</small>
                </h1>
                @if(Session::has('message'))
                    <p class="text-danger">{{ Session::get('message') }}</p>
                @endif
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{ route('admin.category.update', $cate->id) }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                   @csrf    
                    <div class="form-group">
                        <label>Category image</label>
                        <input class="form-control" name="image"  type="file" />
                        <input class="form-control" name="image_old" value="{{ $cate->image }}" type="hidden" />
                        <img src="{{asset('storage/images/'.$cate->image) }}" height="50px" width="50px"/>
                    </div>
                    <div class="form-group">
                        <label>Category name</label>
                        <input type="text" value="{{ $cate->name }}" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Category Description</label>
                        <textarea class="form-control" rows="3" value="{{ $cate->description }}"  name="description">{{ $cate->description }}</textarea>
                    </div>
                   
                    <button type="submit" class="btn btn-default">Update</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection