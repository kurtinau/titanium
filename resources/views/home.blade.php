@extends('_layouts.home.home_default')

@section('navigator_categories')
	<ul class="menulevel">
		@foreach ($categories as $category)
			<li><a href="{{  URL('/products/'.$category->id) }}" title="{{ $category->name }}">{{ $category->name }}</a></li>
		@endforeach
	</ul>
@endsection


@section('recommended_products')
	<ul id="ScrollBox" class="clearfix">
		@foreach ($products_rcd as $product_rcd)
		<li><a href="{{ URL('/products/'.$product_rcd->category_id.'/'.$product_rcd->id) }}"><img src="{{ URL('/img'. $product_rcd->file_path . '?w=140&h=100&fit=crop') }}" alt="" width="140" height="100"><span>{{ $product_rcd->name }}</span></a></li>
		@endforeach
 	</ul>
@endsection



@section('show_products')
	@foreach ($products_show as $product_show)
		<li><a href="{{ URL('/products/'.$product_show->category_id.'/'.$product_show->id) }}">
			<img src="{{ URL('/img'.$product_show->file_path.'?w=154&h=110&fit=crop') }}" alt="" width="154"
								height="110" /><span>{{ $product_show->name }}</span>
						</a>
						</li>
	@endforeach
@endsection


@section('home_menu_selected')
	id="menu_selected"
@endsection
