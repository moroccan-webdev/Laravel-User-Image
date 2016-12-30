@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Clients
@endsection

@section('inpage')
	Mailbox > <a href="{{ url('client') }}" >Inbox</a>
@endsection

@section('stylesheets')
<link href="{{ url('vendor/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet">
<link rel="stylesheet" href="../../plugins/iCheck/flat/blue.css">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.6 -->
<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<!-- fullCalendar 2.2.5-->
<link rel="stylesheet" href="../../plugins/fullcalendar/fullcalendar.min.css">
<link rel="stylesheet" href="../../plugins/fullcalendar/fullcalendar.print.css" media="print">
<!-- Theme style -->
<link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
		 folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="../../plugins/iCheck/flat/blue.css">
@endsection


@section('main-content')
<div class="row">
	<div class="col-lg-12 col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Inbox</h3>

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

          <form method="GET" action="{{ route('client.index') }}">
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
								<td style="margin-left:15px">Title</td>
								<td>Email</td>
								<td>Message</td>
								<td>Phone</td>
								<td>Received At</td>
								<td>Actions</td>
							</thead>
              <tbody>
                @if($clients->count())
      						@foreach($clients as $key => $client)
              <tr>
                <td><i class='fa fa-envelope-open-o'></i></td>
                <td style="margin-left:15px" class="mailbox-name"><a href="{!!Route('client.show', array($client->id))!!}">{{ substr($client->name , 0, 15)}} {{ strlen($client->name) > 15 ? "...": ""}}</a></td>
                <td class="mailbox-subject"><b>{{ substr($client->email , 0, 20)}} {{ strlen($client->email) > 20 ? "...": ""}}</b></td>
								<td>{{ substr($client->body , 0, 20)}} {{ strlen($client->body) > 20 ? "...": ""}}</td>
                <td class="mailbox-date">{{ substr($client->phone , 0, 15)}} {{ strlen($client->phone) > 15 ? "...": ""}}</td>
                <td class="mailbox-date">{{$client->created_at}}</td>
                <td><a href="{{Route('client.show',$client->id)}}" class="btn btn-primary btn-xs"><i class='fa fa-eye'></i></a>
							    <div class="btn-xs" style="display:inline-block">
								    {!! Form::open(['route' => ['client.destroy', $client->id], 'method' => 'DELETE']) !!}
								    <button type="submit" class="btn btn-danger btn-xs"><i class='fa fa-trash'></i></button>
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
            	{{ $clients->links() }}
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
