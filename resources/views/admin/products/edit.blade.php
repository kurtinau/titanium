@extends('_layouts.admin.adminManage')

@section('content')
<script> window.onload = function() {
  document.getElementById('file').onchange = function(evt) {
    // 如果浏览器不支持FileReader，则不处理
    if (!window.FileReader) return;
    var files = evt.target.files;
    for (var i = 0,
    f; f = files[i]; i++) {
      if (!f.type.match('image.*')) {
        continue;
      }
      var reader = new FileReader();
      reader.onload = (function(theFile) {
        return function(e) {
          // img 元素
          document.getElementById('previewImage').src = e.target.result;
        };
      })(f);
      reader.readAsDataURL(f);
    }
  }
} 
</script>
<style type="text/css">
.edit_image{
  display:inline;
}
</style>
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">编辑产品</div>

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

          <form action="{{ URL('admin/products/'.$product->id) }}" method="POST" enctype="multipart/form-data">
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <br>
            名称:<input type="text" name="name" class="form-control" required="required" value="{{ $product->name }}">
            <br>

            请选择类别:<select name="category_id" class="form-control">
              @foreach ($categories as $category)
                @if ($category->id == $product->category_id)
                  <option value="{{ $category->id }}" selected="selected">{{ $category->name }}</option>
                @else 
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
              @endforeach
            </select>
            <br>
          <div style="text-align:center;">
            <div class="edit_image">
              <img src="{{ URL('img/'. $product->file_path).'?w=200&h=200&fit=crop'}}" style="width:200px;height:200px;">
            <!-- <img src="{{ URL($host . $product->file_path) }}" style="width:200px;height:200px;"> -->
              
          </div>
          <div class="edit_image">
              <img src="" style="width:200px;height:200px;" id="previewImage" >
            <!-- <img src="{{ URL($host . $product->file_path) }}" style="width:200px;height:200px;"> -->
              
          </div>
          <br>
          <div style="text-align:center;">
            <div class="edit_image">原文件&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
            <div class="edit_image">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;新文件</div>
          </div>
        </div>
            <br>
            选择文件：<input type="file" name="file" id="file" class="form-control" required="required">
            <br>
            备注:<textarea name="remark" rows="10" class="form-control">{{ $product->remark }}</textarea>
            <br>
            是否推送到主页:
            <div class="form-control" >
            @if ($product->is_home == 1)
              <input type="radio" name="show_in_home" value="1" checked="checked">是
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="show_in_home" value="0">否
            
            @else
              <input type="radio" name="show_in_home" value="1">是
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="show_in_home" value="0" checked="checked">否
            @endif
            </div>  
            <br>
            是否推送到推荐:
            <div class="form-control" >
              @if ($product->is_rcd == 1)
              <input type="radio" name="show_in_recommand" value="1" checked="checked">是
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="show_in_recommand" value="0">否
            
            @else
              <input type="radio" name="show_in_recommand" value="1">是
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="show_in_recommand" value="0" checked="checked">否
            @endif
            </div>
            <br>
            <button class="btn btn-lg btn-info">编辑产品</button>
            <a href="{{ URL('admin/products') }}" class="btn btn-lg btn-info">返回</a>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection