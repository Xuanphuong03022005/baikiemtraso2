@extends('admin.master')
@section('content')
  <!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>Edit</small>
                </h1>
                @if(Session::has('message'))
                <p class="text-danger">{{ Session::get('message') }}</p>
            @endif
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data"> 
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Image</label>
                        <input class="form-control" name="image" type="file" />
                        <input class="form-control" name="image_old" value="{{ $product->image }}" type="hidden" />
                        <img src="{{asset('storage/images/'. $product->image ) }}" height="50px" width="50px"/>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" value= "{{ $product->name }}" placeholder="Please Enter Username" />
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" name="unit_price" value="{{ $product->unit_price }}" placeholder="Please Enter Password" />
                    </div>
                    <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control" name="description"  rows="3">{{ $product->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Product Type: </label>
                        <select name="id_type" id="">
                            @foreach($categories as $key => $value)
                            <option value="{{ $value->id }}" 
                               {{ $value->id == $product->id_type ? 'selected' : "" }}>{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Product unit: </label>
                        <select name="unit" id="">
                            <option value="hộp"  {{ $value->unit == 'hộp' ? 'selected' : "" }}>hộp</option>
                            <option value="cái" {{ $value->unit == 'cái' ? 'selected' : "" }}>cái</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Product update</button>
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