@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('inpage')
	<a href="{{ url('profile') }}" >Profile</a>
@endsection

@section('main-content')
<!-- Horizontal Form -->
<div class="row">
	<div class="col-lg-12 col-xs-12">
		<div class="box box-info">
	    <div class="box-header with-border">
	        <h3 class="box-title">Edit Your Profile</h3>
	    </div>

			@if (count($errors) > 0)
					<div class="alert alert-danger">
							<strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
							<ul>
									@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
									@endforeach
							</ul>
					</div>
			@endif

	  <!-- /.box-header -->
	  <!-- form start -->
	  <form enctype="multipart/form-data" action="/profile" method="POST" class="form-horizontal">
	    <div class="box-body">
	      <div class="col-lg-3 col-xs-12 col-md-3">
	                  <img src="/uploads/avatars/{{ $user->avatar}}" id="avatar_image">
	                  <div class="profileUpload">
	                      <label style="margin-bottom: 10px ; padding-left: 50px">Profile Image</label>
	                      <input type="file" name="avatar">
	                  </div>

	      </div>
	      <div class="col-lg-9 col-xs-12 col-md-9" id="profilefields">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group has-feedback">
							<input type="text" class="form-control" placeholder="{{ trans('adminlte_lang::message.fullname') }}" name="name" value="{{ old('name') }}"/>
							<span class="glyphicon glyphicon-user form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
							<input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}" name="email" value="{{ old('email') }}"/>
							<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
							<input type="text" class="form-control" placeholder="Phone number" name="phone" value="{{ old('phone') }}"/>
							<span class="glyphicon glyphicon-earphone form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
							<input type="text" class="form-control" placeholder="Address" name="address" value="{{ old('address') }}"/>
							<span class="glyphicon glyphicon-globe form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
							<input type="text" class="form-control" placeholder="City" name="city" value="{{ old('city') }}"/>
							<span class="glyphicon glyphicon-home form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
							<input type="text" class="form-control" placeholder="Role" name="role" value="{{ old('role') }}"/>
							<span class="glyphicon glyphicon-briefcase form-control-feedback"></span>
					</div>

					<div class="form-group has-feedback">
							<input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password"/>
							<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
							<input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.retrypepassword') }}" name="password_confirmation"/>
							<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
					</div>
	    </div>
	  </div>
	    <!-- /.box-body -->
	      <div class="box-footer">
	        <a href="{{url('home') }}" type="button" class="btn btn-default">Cancel</a>
	        <input type="submit" class="pull-right btn btn-md btn-primary">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
	      </div>
	    <!-- /.box-footer -->
	</div>
	</div>
</div>
@endsection
