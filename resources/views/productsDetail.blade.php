@extends('_layouts.home.other_default')

@include('products')

@section('page_right')
    <div class="site-nav"><span>当前位置 : </span><a href="{{ URL('/home') }}">公司主页</a> &gt;&gt; <a href="{{ URL('/products') }}" title="产品展示">产品展示</a>&gt;&gt;{{ $product->name }}</div>
      <div class="page-productsdetail">
        <h1 class="productsdetail-title">{{ $product->name }}</h1>
        <div>
        	<p style="text-align: center;">
        		<img src="{{ URL('img'.$product->file_path).'?w=300&h=215&fit=crop' }}" alt="" />
        		<br/>
        	</p>
        	<p>名称：{{ $product->name }}</p>
        	<p>描述：{{ $product->remark }}</p>
        </div>
      </div>
@overwrite

