@extends('layouts.app')

@section('stylesheets')
<link href="{{ url('vendor/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet">
@endsection


@section('content')
<!--
<div class="row">

	<div class="col-md-10">
		<h1>All Clients</h1>
	</div>

	<div class="col-xs-2">
		<a href="{{ Route('client.create') }}" class="btn btn-lg btn-primary btn-h1-spacing">Create new client</a>
	</div>

<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				 <th>#</th>
				 <th>Name</th>
				 <th>Title</th>
				 <th>Email</th>
				 <th>City</th>
				 <th>Body</th>
				 <th>Created At</th>
				 <th></th>
			</thead>
			<tbody>
				@foreach($clients as $client)
					<tr>
						<th>{{ $client->id }}</th>
						<td>{{ substr($client->name , 0, 20)}} {{ strlen($client->name) > 20 ? "...": ""}}</td>
						<td>{{ substr($client->title , 0, 40)}} {{ strlen($client->title) > 20 ? "...": ""}}</td>
						<td>{{ substr($client->email , 0, 20)}} {{ strlen($client->email) > 50 ? "...": ""}}</td>
						<td>{{ substr($client->city , 0, 50)}} {{ strlen($client->city) > 50 ? "...": ""}}</td>
						<td>{{ substr($client->body , 0, 40)}} {{ strlen($client->body) > 50 ? "...": ""}}</td>
						<td>{{ date('M j; Y', strtotime($client->created_at)) }}</td>
						<td><a href="{{Route('client.show',$client->id)}}" class="btn btn-primary btn-xs">View</a>
						    <a href="{{Route('client.edit',$client->id)}}" class="btn btn-success btn-xs">Edit</a>
						    <div class="btn-xs" style="display:inline-block">

						    {!! Form::open(['route' => ['client.destroy', $client->id], 'method' => 'DELETE']) !!}
						    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
						    {!! Form::close() !!}

		            </div>
            </td>
				  </tr>
				@endforeach
			</tbody>
		</table>
			<div class="text-center">
				{{ $clients->links() }}
			</div>
    </div>
-->
		<div class="panel panel-primary">
	  <div class="panel-heading">Clients management</div>
	  <div class="panel-body">
	    	<form method="GET" action="{{ route('client.index') }}">

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<input type="text" name="titlesearch" class="form-control" placeholder="Enter Title For Search" value="{{ old('titlesearch') }}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<button class="btn btn-success">Search</button>
						</div>
					</div>
				</div>
			</form>

			<table class="table table-bordered">
				<thead>
					<th>Id</th>
					<th>Name</th>
					<th>Title</th>
					<th>Email</th>
					<th>City</th>
					<th>Body</th>
				</thead>
				<tbody>
					@if($clients->count())
						@foreach($clients as $key => $client)
							<tr>
								<td>{{ ++$key }}</td>
								<td>{{ substr($client->name , 0, 20)}} {{ strlen($client->name) > 20 ? "...": ""}}</td>
								<td>{{ substr($client->title , 0, 40)}} {{ strlen($client->title) > 20 ? "...": ""}}</td>
								<td>{{ substr($client->email , 0, 20)}} {{ strlen($client->email) > 20 ? "...": ""}}</td>
								<td>{{ substr($client->city , 0, 50)}} {{ strlen($client->city) > 50 ? "...": ""}}</td>
								<td>{{ substr($client->body , 0, 40)}} {{ strlen($client->body) > 50 ? "...": ""}}</td>
							</tr>
						@endforeach
					@else
						<tr>
							<td colspan="4">There are no data.</td>
						</tr>
					@endif
				</tbody>
			</table>
			{{ $clients->links() }}
	  </div>
	</div>


@endsection
