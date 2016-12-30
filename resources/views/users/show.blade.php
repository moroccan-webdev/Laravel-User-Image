@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
<!-- Horizontal Form -->
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $user->name}} Profile</h3>
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
		<div class="box-tools pull-right">
			@if($previous)
			<a href="{{ route( 'user.show', $previous) }}" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
			@endif
			@if($next)
			<a href="{{ route( 'user.show', $next) }}" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
			@endif
		</div>
    <div class="box-body">
      <div class="col-md-4 avatar">
          <img src="/uploads/avatars/{{ $user->avatar}}" id="avatar_image_user">
      </div>
    <div class="col-md-8">

					<div id="showinfo">
							Full Name : {{ $user->name}}
					</div>
					<div id="showinfo">
							Email : {{ $user->email}}
					</div>
					<div id="showinfo">
							Phone number : {{ $user->phone}}
					</div>
					<div id="showinfo">
							Address : {{ $user->address}}
					</div>
					<div id="showinfo">
							City : {{ $user->city}}
					</div>
					<div id="showinfo">
							Role : {{ $user->role}}
					</div>
			</div>
		<div class="col-md-12">
				<div class="box-footer">
					<div class="pull-right">
							<button type="submit" class="btn btn-default"><a href="{{url('user') }}">Cancel</a></button>
					</div>
					{!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE']) !!}
					<button type="submit" class="btn btn-danger"><i style="margin-right:6px; align:right;"class='fa fa-trash'></i>Delete</button>
					{!! Form::close() !!}
				</div>
		</div>
@endsection
