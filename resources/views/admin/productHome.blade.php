@extends('_layouts.admin.adminManage')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">

				<div class="panel-heading">产品管理</div>

				<div class="panel-body">
					<a href="{{ URL('admin/products/create') }}" class="btn btn-lg btn-primary">新增</a>
          <a href="{{ URL('admin') }}" class="btn btn-lg btn-primary">返回</a>
          <!-- <img src="https://s3-ap-southeast-1.amazonaws.com/youhaotaijin.titanium/玫瑰金/faa4d067546cf9a91d99b135dac5ef81.jpg"> -->
       


        
       <div class="page">
                  <ul style="list-style:none;margin:0px; ">
                    <hr>
            @foreach ($products as $product)
             <li style="float:left;border:1px solid black;"><a><img src="{{ URL('img/' . $product->file_path) . '?w=200&h=200&fit=crop'}}" style="width:200px;height:200px;" ></a>
            <div class="content">
            <br>
            <a href="{{ URL('admin/products/'.$product->id.'/edit') }}" class="btn btn-success">编辑</a>
            
            <form action="{{ URL('admin/products/'.$product->id) }}" method="POST" style="display: inline;">
              <input name="_method" type="hidden" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit" class="btn btn-danger" onclick="javascript:return confirm('您确认要删除此产品吗？')";>删除</button>
            </form>
          </div>
          </li>

          
              @endforeach
          </ul>
      </div>
</div>



			               <hr> 
                <div style="margin: 0 auto;ext-align:center;"><?php echo $products->render();?></div>
    </div>
		</div>
	</div>
</div>
@endsection
