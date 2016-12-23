@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="well">
      <h1>Name: {{ $client->name }}</h1>
      <h2>Title: {{ $client->title }}</h2>
      <h2>Email: {{ $client->email }}</h2>
      <h2>Phone: {{ $client->phone }}</h2>
      <h2>Address: {{ $client->address }}</h2>
      <h2>City: {{ $client->city }}</h2>
      <h2>Website: {{ $client->website }}</h2>
      <p>Body: {{ $client->body }}</p>
    </div>
  </div>
  <div class="col-md-4">
    <div class="well">
      <dl class="dl-horizontal">
        <dt>Create At: </dt>
        <dd>{{ date('M j, Y H:i', strtotime($client->created_at)) }}</dd>
      </dl>
      <dl class="dl-horizontal">
        <dt>Last Updated: </dt>
        <dd>{{ date('M j, Y  H:i', strtotime($client->updated_at)) }}</dd>
      </dl>
      <hr>
      <div class="row">
        <div class="col-sm-6">
          {!!  Html::linkRoute('client.edit', 'Edit', array($client->id), array('class' => 'btn btn-primary btn-block')) !!}
        </div>
        <div class="col-sm-6">
          {!! Form::open(['route' => ['client.destroy', $client->id], 'method' => 'DELETE']) !!}
          {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
          {!! Form::close() !!}
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          {!!  Html::linkRoute('client.index', '<< See All Posts',[], array('class' => 'btn btn-default btn-block btn-h1-spacing')) !!}
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
