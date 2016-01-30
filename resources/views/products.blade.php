@section('left-products')
      
        <h2><span>产品展示</span></h2>
        <div id="LeftMenu" class="ddsmoothmenu-v">
          <ul>
          	@foreach ($categories as $category)
              @if ($flag == $category->id)
          		  <li><a href="{{ URL('/products/'.$category->id) }}" title="{{ $category->name }}" id="menu_selected"><span>{{ $category->name }}</span></a></li>
              @else
                <li><a href="{{ URL('/products/'.$category->id) }}" title="{{ $category->name }}"><span>{{ $category->name }}</span></a></li>
              @endif
          	@endforeach
          </ul>
        </div>
        <script type="text/javascript">
    ddsmoothmenu.init({
      mainmenuid: "LeftMenu", //Menu DIV id
      orientation: 'v', //Horizontal or vertical menu: Set to "h" or "v"
      classname: 'ddsmoothmenu-v', //class added to menu's outer DIV
      //customtheme: ["#804000", "#482400"],
      contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
      })
        </script>

@endsection



@section('products_menu_selected')
	id="menu_selected"
@endsection

@section('navigator_categories')
	<ul class="menulevel">
		@foreach ($categories as $category)
			<li><a href="{{  URL('/products/'.$category->id) }}" title="{{ $category->name }}">{{ $category->name }}</a></li>
		@endforeach
	</ul>
@endsection