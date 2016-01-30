<div class="top">
			<img src="{{ asset('/images/logo.gif') }}" width="650" height="90" alt="上海网聚化工有限公司" />
			<div id="lang">
				<a
					href="javascript:if(confirm('只有企业版才有多语言功能，请点击确定访问netgather.com咨询。')){location.href='http://www.netgather.com'}"><img
					src="{{ asset('/images/gb.gif') }}" width="16" height="11" alt="English" />English</a>
			</div>
</div>
<div id="MainMenu" class="ddsmoothmenu">
			<ul>
				<li><a href="{{ URL('home') }}" title="公司主页" @yield('home_menu_selected')><span>公司主页</span>
				</a>
				</li>
				<li><a href="single.html" title="关于我们" @yield('about_menu_selected')><span>关于我们</span>
				</a>
				<ul class="menulevel">
						<li><a href="single.html" title="组织构架">组织构架</a>
						</li>
						<li><a href="single.html" title="公司历史">公司历史</a>
						</li>
						<li><a href="single.html" title="联系我们">联系我们</a>
						</li>
					</ul>
				</li>
				<li><a href="{{ URL('products') }}" title="产品展示" @yield('products_menu_selected')><span>产品展示</span>
				</a>
				@yield('navigator_categories')
				</li>
				<li><a href="news.html" title="新闻中心" @yield('news_menu_selected')><span>新闻中心</span>
				</a>
				</li>
				<li><a href="jobs.html" title="招聘信息" @yield('jobs_menu_selected')><span>招聘信息</span>
				</a>
				</li>
				<li><a href="guestbook.html" title="留言反馈" @yield('guestbook_menu_selected')><span>留言反馈</span>
				</a>
				</li>
			</ul>
		</div>
		<script type="text/javascript">
			$(function() {
				$("#banner").KinSlideshow({
					moveStyle : "right",
					titleBar : {
						titleBar_height : 32,
						titleBar_bgColor : "#000",
						titleBar_alpha : 0.7
					},
					titleFont : {
						TitleFont_size : 12,
						TitleFont_color : "#FFFFFF",
						TitleFont_weight : "normal"
					},
					btn : {
						btn_bgColor : "#2d2d2d",
						btn_bgHoverColor : "#1072aa",
						btn_fontColor : "#FFF",
						btn_fontHoverColor : "#FFF",
						btn_borderColor : "#4a4a4a",
						btn_borderHoverColor : "#1188c0",
						btn_borderWidth : 1
					}
				});
			})
		</script>
		<div id="banner">
			<a href="#"><img src="{{ asset('/images/banner01.jpg') }}"
				alt="多年的经营过程中，不断优化货源渠道，使产品价格更具竞争力！" width="950" height="152" />
			</a> <a href="#"><img src="{{ asset('/images/banner02.jpg') }}"
				alt="多年的经营过程中，不断优化货源渠道，使产品价格更具竞争力！" width="950" height="152" />
			</a> <a href="#"><img src="{{ asset('/images/banner03.jpg') }}"
				alt="多年的经营过程中，不断优化货源渠道，使产品价格更具竞争力！" width="950" height="152" />
			</a>
		</div>
		