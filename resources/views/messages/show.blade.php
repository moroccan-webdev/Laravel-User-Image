@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Show
@endsection

@section('main-content')
<div class="container">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Sent Mail</h3>

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
          <a href="{{ route( 'message.show', $previous) }}" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
					@endif
					@if($next)
					<a href="{{ route( 'message.show', $next) }}" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
					@endif
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        <div class="mailbox-read-info">
          <h3>Message Subject: {{ $message->subject }}</h3>
          <h5>From: {{ $message->email }}
            <span class="mailbox-read-time pull-right">{{ date('M j, Y H:i', strtotime($message->created_at)) }}</span></h5>
        </div>
        <!-- /.mailbox-read-info -->
        <!-- /.mailbox-controls -->
        <div class="mailbox-read-message">
          <p>{!! $message->message !!}</p>
        </div>
        <!-- /.mailbox-read-message -->
      </div>
      <!-- /.box-body -->
			@if( ! empty($message->attachment))
			<div class="box-footer">
				<ul class="mailbox-attachments clearfix">
					<li>
						<span class="mailbox-attachment-icon"><i class="fa fa-file-o"></i></span>

						<div class="mailbox-attachment-info">
							<a href="uploads/files/{{ $message->attachment}}" download="{{ $message->attachment}}" class="mailbox-attachment-name"><span><i class="fa fa-paperclip" style="margin-right:5px;"></span></i>{{ $message->attachment}}</a>
									<span style="margin-left:30px;"class="mailbox-attachment-size">
									{{ HumanReadable::bytesToHuman($message->size) }}
									</span>
						</div>
					</li>
				</ul>
			</div>
			@endif
      <!-- /.box-footer -->
      <div class="box-footer">
        <div class="pull-right">
					<a href="{{Route('getPDF',$message->id)}}" type="button" class="btn btn-default"><i style="margin-right:5px"class='fa fa-print'></i>Print</a>
        </div>
				{!! Form::open(['route' => ['message.destroy', $message->id], 'method' => 'DELETE']) !!}
      	<button type="submit" class="btn btn-default"><i style="margin-right:6px"class='fa fa fa-trash'></i>Delete</button>
				{!! Form::close() !!}
      </div>
      <!-- /.box-footer -->
    </div>
    <!-- /. box -->
  </div>
</div>
@endsection
