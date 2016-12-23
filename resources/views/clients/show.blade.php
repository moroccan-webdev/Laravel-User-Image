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
          <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
          <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
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
        <div class="mailbox-controls with-border text-center">
          <div class="btn-group">
            <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
              <i class="fa fa-trash-o"></i><a href="#"></a></button>
            <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply">
              <i class="fa fa-reply"></i></button>
            <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Forward">
              <i class="fa fa-share"></i></button>
          </div>
          <!-- /.btn-group -->
          <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
            <i class="fa fa-print"></i></button>
        </div>
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
          <button type="button" class="btn btn-default"><i class="fa fa-reply"></i> Reply</button>
        </div>
        <button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
        <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
      </div>
      <!-- /.box-footer -->
    </div>
    <!-- /. box -->
  </div>
</div>
@endsection
