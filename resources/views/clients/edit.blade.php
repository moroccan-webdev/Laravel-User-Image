@extends('layouts.app')

@section('stylesheets')
{!! Html::style('css/parsley.css') !!}
@endsection

@section('content')

<div class="row">
	{!! Form::model($client, ['route' =>['client.update',$client->id],'method' => 'PUT']) !!}
		<div class="col-md-8">
      <div class="well">
				{{ Form::label('name','Name: ')}}
				{{ Form::text('name', null, array('class' => 'form-control', 'required' => '','maxlength' => '255'))}}

				{{ Form::label('title','Title: ')}}
				{{ Form::text('title', null, array('class' => 'form-control', 'required' => '','maxlength' => '255'))}}

				{{ Form::label('email','Email: ')}}
				{{ Form::text('email', null, array('class' => 'form-control', 'required' => '','maxlength' => '255'))}}

				{{ Form::label('phone','Phone: ')}}
				{{ Form::text('phone', null, array('class' => 'form-control', 'required' => '','maxlength' => '255'))}}

				{{ Form::label('address','Address: ')}}
				{{ Form::text('address', null, array('class' => 'form-control', 'required' => '','maxlength' => '255'))}}

				{{ Form::label('city','City: ')}}
				{{ Form::text('city', null, array('class' => 'form-control', 'required' => '','maxlength' => '50'))}}

				{{ Form::label('website','Website: ')}}
				{{ Form::text('website', null, array('class' => 'form-control','maxlength' => '255'))}}

				{{ Form::label('body','Body: ')}}
				{{ Form::textarea('body', null, array('class' => 'form-control', 'required' => '','maxlength' => '255'))}}
		</div>
		</div>

		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Created At: </dt>
					<dd>{{ date('M j, Y H:i', strtotime($client->created_at)) }}</dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Last Updated: </dt>
					<dd>{{ date('M j, Y  H:i', strtotime($client->updated_at)) }}</dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!!  Html::linkRoute('client.show', 'Cancel', array($client->id), array('class' => 'btn btn-danger btn-block')) !!}
					</div>
					<div class="col-sm-6">
					    {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block'])}}
				    </div>
				</div>
			</div>
		</div>
	{!! Form::close() !!}
</div>

@endsection

@section('scripts')
		{!! Html::script('js/parsley.min.js') !!}
@endsection
