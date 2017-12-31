<script type="text/javascript" src="/js/home/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/js/home/jquery.autocom.js"></script>
<script>
    $(document).ready(function() {
        $(".mainProNav dl dt").mouseover(function() {
            $(".mainProNav dl").removeClass("dlHover");
            $(this).parent().addClass("dlHover");
        })
        $(".mainProNav").hover(function() {
            $(this).addClass("mainProNavHover");
        },function() {
            $(this).removeClass("mainProNavHover");
            $(".mainProNav dl").removeClass("dlHover");
        })
    });
</script>
<div class="site-nav clearfix j_floor5">
    <div class="sn-bd">
        <div class="fl" id="header_login_info">
            <div class="fl z_index_01"><a href="/" class="mr10 ml10"><i class="icon-1"></i>首页</a>|
                <a href="javascript:void(0)" class="mr10 ml10 sn-b-j" rel="nofollow"><i class="icon-2"></i>关注我们
                    <b><img src="/images/wx.png" alt="网络资源，网络当日最新资讯"/></b>
                </a>
            </div>
        </div>
        <div class="fr">
            <a href="#" class="ml10" rel="nofollow">会员中心</a> |
            <a href="#" class="ml10" rel="nofollow">登录</a> |
            <a href="#" class="ml10" rel="nofollow">注册</a>|
            <span class="ml10"><a href="#" target="_blank">资讯中心</a></span>
        </div>
    </div>
    <div class="curtain"></div>
</div>
<div class="header_hd_wp">
    <div class="header clearfix">
        <div class="headercon">
            <div class="clearfix">
                <h1 class="logo" style="margin-top:30px;"><a href="/"><img src="holder.js/245x58?text=LOGO" alt="网络资源下载"/></a></h1>
                <div class="search">
                    <input class="search-text" autocomplete="off" value="" id="keyword" type="text" name="keyword" placeholder="请输入关键字进行搜索"/>
                    <input class="search-btn" id="search_submit"  type="button" value="搜  索"/>
                    <div class="search_xl_text">
                        <div class="search_xl_wrap">
                            <h3 class="search_xl_h3">最近搜索</h3>
                            <div id="search_suggest" class="search_suggest" >
                                <ul><li></li></ul>
                            </div>
                        </div>
                    </div>
                    <div class="hot_search_m">热门推荐：
                         <a href="#" target="_blank">php</a>
                         <a href="#" target="_blank">python</a>
                         <a href="#" target="_blank">javascript</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="navigationBar">
            <div class="navigationBarInnel">
                <div class="mainMenuV">
                    <a href="#">首页</a>
                    <a href="#" target="_blank">资源下载</a>
                    <a href="#" target="_blank">在线手册</a>
                    <a href="#" target="_blank">Bug社区</a>
                    <a href="#" target="_blank">工具下载</a>
                    <a href="#" target="_blank">内库下载<i><img src="/images/hot.gif"/></i></a>
                    <a href="#" target="_blank">资讯中心</a>
                </div><!-- mainMenuV end -->
            </div><!-- mainMenudl end -->
        </div>
    </div>
</div>
