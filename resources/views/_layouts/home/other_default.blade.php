<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  @include('_layouts.home.header')
</head>
<body>
<div id="wrapper">

  @include('_layouts.home.navigator')
    
  <div id="page_main" class="clearfix">
    <div class="page-right">
      @yield('page_right')
    </div>

    <div class="page-left">
      <div class="left-products">
        @yield('left-products')
      </div>
 
      <div class="left-search">
        <h2><span>站内搜索</span></h2>
        <form action="" method="post" id="sitesearch" name="sitesearch">
          <p>
            <select name="searchid" id="searchid"><option value="2" selected="selected">产品展示</option><option value="3">新闻中心</option><option value="4">招聘信息</option></select>
          </p>
          <p>
            <input name="searchtext" type="text" id="searchtext"/>
          </p>
          <p>
            <input name="searchbutton" type="submit" id="searchbutton" value="" />
          </p>
        </form>
      </div>

      <div class="left-contact">
        <h2><span>联系我们</span></h2>
        <p><span>地址: </span>上海市嘉定区华亭镇<br />
          <span>邮编: </span>200000<br />
          <span>联系人: </span>网聚化工<br />
          <span>电话: </span>021-58888888<br />
          <span>传真: </span>021-58888888<br />
          <span>手机: </span>13888888888<br />
          <span>邮箱: </span>netgather@netgather.com</p>
      </div>

      <img src="{{ asset('images/tel.gif') }}" width="240" height="59" alt="联系我们" />
    </div>
  </div>
    @include('_layouts.home.footer')
</div>
</body>
</html>