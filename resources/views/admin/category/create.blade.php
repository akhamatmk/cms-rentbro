@extends('layout.main')

@section('title', 'Admin RentBro')

@section('content')
	
	<div class="row bg-title">
       <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h4 class="page-title">Form Category</h4>
       </div>
       <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
				<a href="{{ URL('category') }}" class="btn btn-success btn-sm pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light" target="_top"> <i class="fa fa-back"></i> Back Cagetory</a>
				<ol class="breadcrumb">
					<li><a href="{{ url('/') }}">Dashboard</a></li>
					<li><a href="{{ url('category') }}">Category</a></li>
					<li class="active">Form Category</li>
				</ol>
       	</div>
       <!-- /.col-lg-12 -->
    </div>

	<div class="row">
	   	<div class="col-sm-12">
	      	<div class="white-box">
				<h3 class="box-title">Form Category</h3>
				<form class="form-horizontal" method="POST" action="{{ URL("category") }}">
					@csrf 
					
					<div class="form-group">
						<label class="control-label col-sm-3">Name :</label>
						<div class="col-sm-5">
					    	<input type="text" name="name" id="name" class="form-control">
					    </div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3">Other Name :</label>
						<div class="col-sm-5">
					    	<input type="text" name="other_name" id="other_name" class="form-control">
					    </div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3">Icon:</label>
						<div class="col-sm-5">
					    	<input type="text" name="icon" id="icon" class="form-control" placeholder="Example user">
					    	<small id="icon_view">This Icon  <span class="glyphicon glyphicon-user"></span> </small>
					    </div>
					</div>

					<div class="form-group">
					    <label class="control-label col-sm-3">Parent :</label>
					    <div class="col-sm-5">
					    	<select class="form-control" name="parent" id="parent">
					    		<option value=""></option>
					    		@if(isset($category))
						    		@foreach($category as $key => $value)
						    			<option value="{{ $value->id }}">{{ $value->name}}</option>
						    		@endForeach
						    	@endIf
					    	</select>
					    </div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3">Deskripsi:</label>
						<div class="col-sm-5">
					    	<textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
					    </div>
					</div>

					<div class="form-group">
					    <div class="col-sm-2">
					    	<button type="submit" style="float: right;" id="add" class="btn btn-primary">Submit</button>
					    </div>
					</div>

				</form>
			</div>
	   </div>
	</div>	
@endsection

@section('script')
<script>
	$(function() {

      	$("#parent").select2();

	    $("#icon").keyup(function(){
	    	var icon = $(this).val();
	    	var html = 'This Icon  <span class="glyphicon glyphicon-'+icon+'"></span>';

	    	$("#icon_view ").html(html);
		});

	});		
</script>
@endsection

