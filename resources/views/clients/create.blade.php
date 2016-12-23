@extends('layouts.app')

@section('stylesheets')
{!! Html::style('css/parsley.css') !!}
@endsection

@section('content')

<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <h1>Create a new Client message</h1>
      <hr>
        {!! Form::open(['route' => 'client.store','form data-parsley-validate' => ''])!!}

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

        {{ Form::submit('Create Post',  array('class' => 'btn btn-success btn-lg btn-block', 'style'=> 'margin-top: 20px'))}}
            {!! Form::close() !!}
  </div>
</div>
@endsection

@section('scripts')
		{!! Html::script('js/parsley.min.js') !!}
@endsection
