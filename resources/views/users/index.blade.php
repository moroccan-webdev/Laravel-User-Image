@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Emails
@endsection

@section('inpage')
	<a href="{{ url('user') }}" >Users</a>
@endsection

@section('stylesheets')
<link href="{{ url('vendor/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet">
@endsection


@section('main-content')
    <!-- form start -->
<div class="row">
	<div class="col-lg-12 col-xs-12">
  	<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Users</h3>

			@if (Session::has('success'))
				<div class="alert alert-success" role="alert">
					<strong>Success:</strong>{{Session::get('success')}}
				</div>
			@endif

			@if (count($errors) > 0)
				<div class="alert alert-danger" role="alert">
					<strong>Errors:</strong>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
				</div>
			@endif

      <form method="GET" action="{{ route('message.index') }}">
        <div class="box-tools pull-right">
          <div class="has-feedback">
            <input type="text" name="titlesearch" class="form-control input-sm" placeholder="Search Mail">
            <span class="glyphicon glyphicon-search form-control-feedback"></span>
          </div>
        </div>
      </form>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
      <div class="table-responsive mailbox-messages">
        <table class="table table-hover table-striped">
					<thead style="font-size:16px; font-weight:bold">
						<td>Image</td>
						<td>Status</td>
						<td>Name</td>
						<td>Email</td>
						<td>Phone</td>
						<td>Role</td>
						<td>Registred On</td>
						<td>Actions</td>
					</thead>
          <tbody>
            @if($users->count())
  						@foreach($users as $key => $user)
          <tr style="padding-top:-20px;">
            <td><img src="/uploads/avatars/{{$user->avatar}}" class="userimage" alt="User Image" /></td>
						<td>
                @if(Auth::user()->name == $user->name)
                <p><i class="fa fa-circle text-success" style="margin-right:3px;"></i>Online</p>
                @else
                <p><i class="fa fa-circle text-danger" style="margin-right:3px;"></i>Offline</p>
                @endif
            </td>
            <td class="mailbox-name"><a href="{!!Route('user.show', array($user->id))!!}">{{$user->name}}</a></td>
            <td class="mailbox-subject"><b>{{$user->email}}</b></td>
            <td class="mailbox-subject"><b>{{$user->phone}}</b></td>
						<td>{{$user->role}}</td>
            <td class="mailbox-date">{{$user->created_at}}</td>
						<td><a href="{{Route('user.show',$user->id)}}" class="btn btn-primary btn-xs"><i class='fa fa-eye'></i></a>
							<div class="btn-xs" style="display:inline-block">
								{!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE']) !!}
								<button type="submit" class="btn btn-danger btn-xs"><i class='fa fa fa-trash'></i></button>
								{!! Form::close() !!}
							</div>
						</td>
        </tr>
          @endforeach
          @else
          <tr>
            <td colspan="4">There are no data.</td>
          </tr>
        @endif
          </tbody>
        </table>
        <!-- /.table -->
      </div>
      <!-- /.mail-box-messages -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer no-padding">
      <div class="mailbox-controls">
        <!-- Check all button -->
        <div class="pull-mmiddle">
        	{{ $users->links() }}
          <!-- /.btn-group -->
        </div>
        <!-- /.pull-right -->
      </div>
    </div>
  </div>
	</div>
</div>
    <!-- /.end form -->
@endsection
