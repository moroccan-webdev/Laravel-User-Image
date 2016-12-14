@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
<!-- Horizontal Form -->
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Your Profile</h3>
    </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form enctype="multipart/form-data" action="/profile" method="POST" class="form-horizontal">
    <div class="box-body">
      <div class="col-md-3">
                  <img src="/uploads/avatars/{{ $user->avatar}}" id="avatar_image">
                  <div class="profileUpload">
                      <label style="margin-bottom: 10px ; padding-left: 50px">Profile Image</label>
                      <input type="file" name="avatar">
                  </div>
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      </div>
      <div class="col-md-9" id="profilefields">
        <div class="form-group ">
            <label for="name" class="col-sm-3 control-label">Full Name</label>

            <div class="col-sm-9">
              <input type="name" class="form-control" id="inputEmail3" placeholder="Email">
            </div>
        </div>
        <div class="form-group ">
            <label for="inputEmail3" class="col-sm-3 control-label">Email</label>

            <div class="col-sm-9">
              <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Password</label>

            <div class="col-sm-9">
              <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Verify Password</label>

            <div class="col-sm-9">
              <input type="password" class="form-control" id="inputPassword3" placeholder="Repeat Password">
            </div>
        </div>
    </div>
  </div>
    <!-- /.box-body -->
      <div class="box-footer">
        <a href="{{url('home') }}" type="button" class="btn btn-default">Cancel</a>
        <input type="submit" class="pull-right btn btn-md btn-primary">
      </div>
    <!-- /.box-footer -->
  </form>
</div>
<!-- /.box -->
<!-- The Recovery Example
<div class="container">
    <div class="row">
        <div class="col-md-3 col-md-offset-1">
          <img src="/uploads/avatars/{{ $user->avatar}}" id="avatar_image">
          <h2>{{ $user->name }}'s Profile</h2>
          <form enctype="multipart/form-data" action="/profile" method="POST">
                <label>Update Profile Image</label>
                <input type="file" name="avatar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="pull-right btn btn-sm btn-primary">
            </form>
        </div>
    </div>
</div>
-->
@endsection
