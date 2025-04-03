@extends('index')
@include('header')
@include('footer')
@section('register')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Đăng ký</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb">
				<a href="{{ route('trangchu') }}">Home</a> / <span>Đăng ký</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<div class="container">
	<div id="content">
		<form action="{{ route('user.store') }}" method="post" class="beta-form-checkout">
			@csrf
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<h4>Đăng ký</h4>
				@if(Session::has('message'))
					<div class="alert alert success">{{ Session::get('message') }} </div>
				@endif
					<div class="space20">&nbsp;</div>

					<div class="form-block">
						<label for="name">Họ và tên</label>
						<input type="text" id="name" name="name" value="{{ old('name') }}" required>
						@error('name')
							<div class="text-danger">{{ $message }}</div>
						@enderror
					</div>
					
					<div class="form-block">
						<label for="user_name">Tên đăng nhập</label>
						<input type="text" id="user_name" name="user_name" value="{{ old('user_name') }}" required>
						@error('user_name')
							<div class="text-danger">{{ $message }}</div>
						@enderror
					</div>
					
					<div class="form-block">
						<label for="phone">Số điện thoại</label>
						<input type="text" id="phone" name="phone" value="{{ old('phone') }}" required>
						@error('phone')
							<div class="text-danger">{{ $message }}</div>
						@enderror
					</div>
					
					<div class="form-block">
						<label for="email">Email</label>
						<input type="email" id="email" name="email" value="{{ old('email') }}" required>
						@error('email')
							<div class="text-danger">{{ $message }}</div>
						@enderror
					</div>
					
					<div class="form-block">
						<label for="birthday">Ngày sinh</label>
						<input type="date" id="birthday" name="birthday" value="{{ old('birthday') }}" required>
						@error('birthday')
							<div class="text-danger">{{ $message }}</div>
						@enderror
					</div>
					
					<div class="form-block">
						<label for="address">Địa chỉ</label>
						<input type="text" id="address" name="address" value="{{ old('address') }}" required>
						@error('address')
							<div class="text-danger">{{ $message }}</div>
						@enderror
					</div>
					
					<div class="form-block">
						<label for="password">Mật khẩu</label>
						<input type="password" id="password" name="password" required>
						@error('password')
							<div class="text-danger">{{ $message }}</div>
						@enderror
					</div>
					
					<div class="form-block">
						<button type="submit" class="btn btn-primary">Đăng ký</button>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</form>
	</div> <!-- #content -->
</div> <!-- .container -->

@endsection
