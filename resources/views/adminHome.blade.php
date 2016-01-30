@extends('_layouts.admin.adminManage')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					admin登录成功！！！
					<br>
					<div>
						<a href="admin/categories">类别管理</a>
						<a href="admin/products">产品管理</a>
						<a href="#">信息管理</a>
					</div>
				</div>

				

				
			</div>
		</div>
	</div>
</div>
@endsection
