@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Clients
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
          <h3 class="box-title">Inbox</h3>
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
            <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
            </button>
            <div class="btn-group">
              <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
              <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
              <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
            </div>
            <!-- /.btn-group -->
            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>

            <!-- /.pull-right -->
          </div>
          <div class="table-responsive mailbox-messages">
            <table class="table table-hover table-striped">
              <tbody>
                @if($clients->count())
      						@foreach($clients as $key => $client)
              <tr>
                <td><input type="checkbox"></td>
                <td class="mailbox-star"><a href=""><i class="fa fa-star text-yellow"></i></a></td>
                <td class="mailbox-name"><a href="{!!Route('client.show', array($client->id))!!}">{{ substr($client->name , 0, 20)}} {{ strlen($client->name) > 20 ? "...": ""}}</a></td>
                <td class="mailbox-subject"><b>{{ substr($client->email , 0, 20)}} {{ strlen($client->email) > 20 ? "...": ""}}</b> - {{ substr($client->body , 0, 40)}} {{ strlen($client->body) > 50 ? "...": ""}}
                </td>
                <td class="mailbox-attachment"></td>
                <td class="mailbox-date">{{$client->created_at}}</td>
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
            <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
            </button>
            <div class="btn-group">
              <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
              <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
              <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
            </div>
            <!-- /.btn-group -->
            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
            <div class="pull-right">
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
