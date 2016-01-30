@extends('_layouts.home.other_default')

@include('products')

@section('page_right')
    <div class="site-nav"><span>当前位置 : </span><a href="{{ URL('/home') }}">公司主页</a> &gt;&gt; <a href="{{ URL('/products') }}" title="产品展示">产品展示</a></div>
      <div class="page-products">
      	<ul class="clearfix">
      		@foreach ($products as $product)
      			<li><a href="{{ URL('products/'. $product->category_id .'/' .$product->id) }}" title="{{ $product->name }}"><img src="{{ URL('img'.$product->file_path.'?w=210&h=150&fit=crop') }}" width="210" height="150" alt="{{ $product->name }}"><span>{{ $product->name }}</span></a></li>
      		@endforeach
	  	</ul>
      </div>
      <div><?php echo $products->render();?></div>
@endsection