@extends('_layouts.admin.adminManage')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">新增产品</div>

        <div class="panel-body">

          @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ URL('admin/products') }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            名称:<input type="text" name="name" class="form-control" required="required">
            <br>
            请选择类别:<select name="category_id" class="form-control">
              @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
            <br>
            上传图片: 
            <!-- 上传图片:<input type="file" name="path" class="form-control" /> -->
            <div id="demo" class="demo"></div>
            <br>
            备注:<textarea name="remark" rows="10" class="form-control"></textarea>
            <br>
            <button class="btn btn-lg btn-info">新增产品</button>
            <a href="{{ URL('admin/products') }}" class="btn btn-lg btn-info">返回</a>

          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection