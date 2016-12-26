@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Compose New message
@endsection

@section('stylesheets')
<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
  <script>
  tinymce.init({
    selector: 'textarea',
		plugins: 'link code legacyoutput print',
		plugins: "textcolor",
  	toolbar: "forecolor backcolor"

  });
  </script>
@endsection

@section('main-content')
<div class="container">


<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Compose New Message</h3>
    </div>
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

		<!--<form action="{{ url('compose') }}" method="POST" files = "true">-->
			<form method="post" enctype="multipart/form-data" action="{{ route('message.store') }}">
                    {{ csrf_field() }}
    <div class="box-body">
      <div class="form-group">
        <input class="form-control" name="email" placeholder="To:">
      </div>
      <div class="form-group">
        <input class="form-control" name="subject" placeholder="Subject:">
      </div>
      <div class="form-group">
            <textarea id="compose-textarea" name="message" class="form-control" style="height: 300px">
            </textarea>
      </div>
      <div class="form-group">
        <div class="btn btn-default btn-file">
          <i class="fa fa-paperclip"></i> Attachment
          <input type="file" name="attachment">
        </div>
        <p class="help-block">Max. 10MB</p>
      </div>
    </div>

    <!-- /.box-body -->
    <div class="box-footer">
      <div class="pull-right">
        <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
      </div>
      <!--<button type="reset" class="btn btn-default"><a href="{{ url('client') }}"><i class="fa fa-times"></i> Discard</a></button>-->
			<a class="btn btn-default" href="{{ url('client') }}"><i class="fa fa-times"></i> Discard</a>
    </div>
		</form>
    <!-- /.box-footer -->
  </div>
  <!-- /. box -->
</div>
</div>
@endsection
