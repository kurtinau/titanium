@extends('_layouts.admin.adminManage')

@section('content')
	<?php phpinfo(); ?>
	<!-- <form action="{{ URL('test') }}" method="POST" enctype="multipart/form-data">
           	<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="file" name="file">
			<button class="btn btn-lg btn-info">确认</button>
	</form>-->	

	<!-- <img src="{{ URL('img/kadf.jpg?w=800') }}"> -->
	<!-- <a><img src="{{ URL('img' .$product->file_path.'?w=800') }}" style="width:200px;height:200px;" ></a> -->


@endsection