@extends('admin.master')
@section('content')
  <!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>Add</small>
                </h1>
                @if(Session::has('message'))
                <p class="text-danger">{{ Session::get('message') }}</p>
            @endif
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{ route('admin.product') }}" method="POST" enctype="multipart/form-data"> 
                    @csrf
                    <div class="form-group">
                        <label>Image</label>
                        <input class="form-control" name="image" type="file" />
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="Please Enter Username" />
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" name="unit_price" placeholder="Please Enter Password" />
                    </div>
                    <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Product Type: </label>
                        <select name="id_type" id="">
                            <option selected>Category</option>
                            @foreach($categories as $key => $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Product unit: </label>
                        <select name="unit" id="">
                            <option value="hộp">hộp</option>
                            <option value="cái">cái</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Product Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection