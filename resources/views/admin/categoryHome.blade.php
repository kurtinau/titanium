@extends('_layouts.admin.adminManage')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">类别管理</div>

				<div class="panel-body">
					<a href="{{ URL('admin/categories/create') }}" class="btn btn-lg btn-primary">新增</a>
          <a href="{{ URL('admin') }}" class="btn btn-lg btn-primary">返回</a>
          			@foreach ($categories as $category)
            <hr>
            <div class="page">
              <h4>{{ $category->id }}</h4>
              <div class="content">
                <p>
                  {{ $category->name }}
                </p>
              </div>
            </div>
            <a href="{{ URL('admin/categories/'.$category->id.'/edit') }}" class="btn btn-success">编辑</a>

            <form action="{{ URL('admin/categories/'.$category->id) }}" method="POST" style="display: inline;">
              <input name="_method" type="hidden" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit" class="btn btn-danger" onclick="javascript:return confirm('您确认要删除此类别吗？')";>删除</button>
            </form>
          @endforeach
				</div>
				
			</div>
		</div>
	</div>
</div>
@endsection
