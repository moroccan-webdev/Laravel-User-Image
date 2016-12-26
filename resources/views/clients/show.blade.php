@extends('adminlte::layouts.app')

@section('htmlheader_title')
	show
@endsection

@section('main-content')
<div class="container">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Read Mail</h3>

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
          <a href="{{ route( 'client.show', $previous) }}" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
					@endif
					@if($next)
					<a href="{{ route( 'client.show', $next) }}" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
					@endif
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        <div class="mailbox-read-info">
          <h3>Message Subject: {{ $client->title }}</h3>
          <h5>From: {{ $client->email }}
            <span class="mailbox-read-time pull-right">{{ date('M j, Y H:i', strtotime($client->created_at)) }}</span></h5>
        </div>
        <!-- /.mailbox-read-info -->
        <!-- /.mailbox-controls -->
        <div class="mailbox-read-message">
          <p>{{ $client->body }}</p>
        </div>
        <!-- /.mailbox-read-message -->
      </div>
      <!-- /.box-body -->
      <!-- /.box-footer -->
      <div class="box-footer">
        <div class="pull-right">
            <!--<button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>-->
        </div>
				{!! Form::open(['route' => ['client.destroy', $client->id], 'method' => 'DELETE']) !!}
      	<button type="submit" class="btn btn-default"><i style="margin-right:6px"class='fa fa fa-trash'></i>Delete</button>
				{!! Form::close() !!}
      </div>
      <!-- /.box-footer -->
    </div>
    <!-- /. box -->
  </div>
</div>
@endsection
