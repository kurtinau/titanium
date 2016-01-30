<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	@include('_layouts.home.header')
</head>
<body>
	<div id="wrapper">
		@include('_layouts.home.navigator')
				
		<div id="index_main" class="clearfix">
			<div class="index-left">
				<div class="index-newproducts">
					<h2>
						<span>暂无信息</span><a href="products.html"><img
							src="{{ asset('images/more.gif') }}" width="32" height="5" alt="产品展示" />
						</a>
					</h2>
					<div class="productsroll">
						<div id="LeftArr1"></div>
						<div id="RightArr1"></div>
						@yield('recommended_products')
						<script language="javascript" type="text/javascript">
						<!--//--><![CDATA[//><!--
							var scrollPic_01 = new ScrollPic();
							scrollPic_01.scrollContId = "ScrollBox"; //内容容器ID
							scrollPic_01.arrLeftId = "LeftArr1";//左箭头ID
							scrollPic_01.arrRightId = "RightArr1"; //右箭头ID
							scrollPic_01.frameWidth = 648;//显示框宽度
							scrollPic_01.pageWidth = 162; //翻页宽度
							scrollPic_01.speed = 10; //移动速度(单位毫秒，越小越快)
							scrollPic_01.space = 5; //每次移动像素(单位px，越大越快)
							scrollPic_01.autoPlay = true; //自动播放
							scrollPic_01.autoPlayTime = 3; //自动播放间隔时间(秒)
							scrollPic_01.initialize(); //初始化
							//   <!
						</script>
					</div>
				</div>
				<div class="index-news">
					<h2>
						<span>新闻中心</span><a href="news.html"><img
							src="{{ asset('/images/more.gif') }}" width="32" height="5" alt="新闻中心" />
						</a>
					</h2>
					<ul>
						<li class="clearfix"><a href="news.html"
							title="未来几年北美聚酯纤维需求快速增长"><img src="{{ asset('/images/index_NewsPic.jpg') }}"
								alt="未来几年北美聚酯纤维需求快速增长" width="110" height="80" />
						</a>
						<h3>
								<a href="news.html" title="未来几年北美聚酯纤维需求快速增长">未来几年北美聚酯纤维需求快速...</a>
							</h3>
							<p>
								据英国PCI二甲苯和聚酯公司高级咨询师MichaelBermish日前表示，受包括服装、家庭装饰、...<a
									href="news.html" title="未来几年北美聚酯纤维需求快速增长">[详细]</a>
							</p>
						</li>
						<li><a href="news.html" title="江苏化工企业接受环境风险全面排查"><span>2011/6/11</span>-
								江苏化工企业接受环境风险全面排查</a>
						</li>
						<li><a href="news.html" title="资源税飙升稀土价格面临再次上涨"><span>2011/6/11</span>-
								资源税飙升稀土价格面临再次上涨</a>
						</li>
						<li><a href="news.html" title="煤炭煤化工机会凸显"><span>2011/6/10</span>-
								煤炭煤化工机会凸显</a>
						</li>
						<li><a href="news.html" title="德国巴斯夫三峡库区化工项目开建在即"><span>2011/6/10</span>-
								德国巴斯夫三峡库区化工项目开建在即</a>
						</li>
					</ul>
				</div>
				<div class="index-about">
					<h2>
						<span>关于我们</span><a href="single.html"><img
							src="{{ asset('/images/more.gif') }}" width="32" height="5" alt="关于我们" />
						</a>
					</h2>
					<p>
						<img src="{{ asset('/images/index_AboutPic.jpg') }}" alt="关于我们" width="145"
							height="181" /><a href="single.html" title="关于我们">
							上海网聚化工有限公司和进出口有限公司是以无机化工、有机化工、精细化工、香精香料、食品添加剂、医药原料及中间体等经营、销售为一体的高科技化工企业。公司位于上海市商业中心,交通十分便捷。<br />
							我公司华东地区总经销双氧水，品质保证...</a>
					</p>
				</div>
				<div class="index-products">
					<h2>
						<span>产品展示</span><a href="products.html"><img
							src="{{ asset('/images/more.gif') }}" width="32" height="5" alt="产品展示" />
						</a>
					</h2>
					<ul class="clearfix">
						@yield('show_products')
					</ul>
				</div>
			</div>
			<div class="index-right">
				<div class="index-search">
					<h2>
						<span>站内搜索</span>
					</h2>
					<form action="" method="post" id="sitesearch" name="sitesearch">
						<p>
							<select name="searchid" id="searchid"><option value="2">产品展示</option>
								<option value="3">新闻中心</option>
								<option value="4">招聘信息</option>
							</select>
						</p>
						<p>
							<input name="searchtext" type="text" id="searchtext" />
						</p>
						<p>
							<input name="searchbutton" type="submit" id="searchbutton"
								value="" />
						</p>
					</form>
				</div>
				<div class="index-jobs">
					<h2>
						<span>招聘信息</span><a href="jobs.html"><img
							src="{{ asset('/images/more.gif') }}" width="32" height="5" alt="招聘信息" />
						</a>
					</h2>
					<ul>
						<li><a href="jobs.html" title="实验室技术人员"><span> -
									实验室技术人员</span>
						</a>
						</li>
						<li><a href="jobs.html" title="文员"><span> - 文员</span>
						</a>
						</li>
						<li><a href="jobs.html" title="销售代表"><span> - 销售代表</span>
						</a>
						</li>
						<li><a href="jobs.html" title="销售主管"><span> - 销售主管</span>
						</a>
						</li>
						<li><a href="jobs.html" title="营销总监"><span> - 营销总监</span>
						</a>
						</li>
					</ul>
				</div>
				<div class="index-contact">
					<h2>
						<span>联系我们</span>
					</h2>
					<p>
						<span>地址: </span>南昌市青云谱区小蓝工业园<br /> <span>邮编: </span>330052<br />
						<span>联系人: </span>友好钛金<br /> <span>电话: </span>021-58888888<br />
						<span>传真: </span>021-58888888<br /> <span>手机: </span>13888888888<br />
						<span>邮箱: </span>netgather@netgather.com
					</p>
				</div>
				<img src="{{ asset('images/tel.gif') }}" width="240" height="59" alt="联系我们" />
			</div>
		</div>

		@include('_layouts.home.footer')
	</div>
</body>
</html>