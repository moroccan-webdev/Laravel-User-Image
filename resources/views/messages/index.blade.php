@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Emails
@endsection


@section('stylesheets')
<link href="{{ url('vendor/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet">
@endsection


@section('main-content')
<div class="container">
    <!-- form start -->
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Sent</h3>

					@if (Session::has('success'))
						<div class="alert alert-success" role="alert">
						<strong>Success:</strong>{{Session::get('success')}}</div>
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
          <div class="mailbox-controls">
            <!-- Check all button -->

            <!-- /.pull-right -->
          </div>
          <div class="table-responsive mailbox-messages">
            <table class="table table-hover table-striped">
							<thead style="font-size:16px; font-weight:bold">
								<td></td>
								<td style="margin-left:15px">Email</td>
								<td>Subject</td>
								<td>Message</td>
								<td>Join</td>
								<td>Received At</td>
								<td>Actions</td>
							</thead>
              <tbody>
                @if($messages->count())
      						@foreach($messages as $key => $message)
              <tr>
                <td><i class='fa fa-envelope-open-o'></i></td>
                <td style="margin-left:15px" class="mailbox-name"><a href="{!!Route('message.show', array($message->id))!!}">{{ substr($message->email , 0, 20)}} {{ strlen($message->email) > 20 ? "...": ""}}</a></td>
                <td class="mailbox-subject"><b>{{ substr($message->subject , 0, 20)}} {{ strlen($message->subject) > 20 ? "...": ""}}</b></td>
								<td> - {{ substr(strip_tags($message->message) , 0, 40)}} {{ strlen(strip_tags($message->message)) > 50 ? "...": ""}}</td>
							  <td class="mailbox-attachment"><i class="{{ ( ! empty($message->attachment) ? 'fa fa-paperclip' : '') }}"</i></td>
                <td class="mailbox-date">{{$message->created_at}}</td>
                <td><a href="{{Route('message.show',$message->id)}}" class="btn btn-primary btn-xs"><i class='fa fa-eye'></i></a>
							    <div class="btn-xs" style="display:inline-block">
								    {!! Form::open(['route' => ['message.destroy', $message->id], 'method' => 'DELETE']) !!}
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
            	{{ $messages->links() }}
              <!-- /.btn-group -->
            </div>
            <!-- /.pull-right -->
          </div>
        </div>
      </div>
    </div>
    <!-- /.end form -->
</div>
@endsection
