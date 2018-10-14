@extends('layouts.app')

@section('content')
<div class="page-list">
    <div class="lt-grid">
        <ul class="type-list fn-clear">
            <li class="cur">
                <a href="#">全部</a>
            </li>
            <li>
                <a href="#">最新</a>
            </li>
        </ul>
        <ul class="product-list fn-clear">
            <li>
                <a href="javascript:;">
                    <div class="pic-box">
                        <img src="/images/default/banner1.jpg" alt="" width="390" height="270">
                    </div>
                    <div class="product-info fn-clear">
                        <span class="fn-left product-name">Sieenna Kit</span>
                        <span class="fn-right product-type">免费</span>
                    </div>
                </a>
            </li>
        </ul>
        <!-- 分页 -->
        <div class="pagination">
            <a href="#" class="pagination-item"><span class="arrow">‹</span> 上一页</a><span class="page-info">1</span><a href="#" class="page">2</a><span class="el">…</span><a href="#" class="pagination-item">下一页 <span class="arrow">›</span></a>
        </div>
        <!-- /分页 -->
    </div>
    <footer class="lt-footer">
        <div class="lt-grid fn-clear">
            <div class="nav-box">
                <h3>产品</h3>
                <ul>
                    <li>
                        <a href="#">产品介绍</a>
                    </li>
                    <li>
                        <a href="#">价格</a>
                    </li>
                    <li>
                        <a href="#">最新更新</a>
                    </li>
                    <li>
                        <a href="#">数据安全</a>
                    </li>
                </ul>
            </div>
            <div class="nav-box">
                <h3>服务</h3>
                <ul>
                    <li>
                        <a href="#">客户案例</a>
                    </li>
                    <li>
                        <a href="#">帮助中心</a>
                    </li>
                    <li>
                        <a href="#">视频教程</a>
                    </li>
                    <li>
                        <a href="#">官方微博</a>
                    </li>
                    <li>
                        <a href="#">用户社区</a>
                    </li>
                </ul>
            </div>
            <div class="nav-box">
                <h3>公司</h3>
                <ul>
                    <li>
                        <a href="#">关于我们</a>
                    </li>
                    <li>
                        <a href="#">公司新闻</a>
                    </li>
                    <li>
                        <a href="#">联系我们</a>
                    </li>
                    <li>
                        <a href="#">隐私申明</a>
                    </li>
                    <li>
                        <a href="#">服务条款</a>
                    </li>
                </ul>
            </div>
            <div class="nav-box">
                <h3>其他</h3>
                <ul>
                    <li>
                        support@photonut.com
                    </li>
                    <li>
                        <p>+0755 400-666-8898</p>
                        <p class="fs18">周一至周日0:00 ~ 24:00</p>
                    </li>
                    <li class="nav-other">
                        <i class="icon-wechat"></i>
                        <a href="#" target="_blank"><i class="icon-weibo"></i></a>
                        <i class="icon-qq"></i>
                    </li>
                </ul>
            </div>
        </div>
        <!-- 预览 -->
        <div class="view-box" id="view-box">
            <header class="lt-header view">
                <div class="header-box fn-clear">
                    <a href="/" class="logo-box"><img class="logo" src="../dest/img/logo.png" alt="" width="184" height="46"><span class="view-title">预览版</span></a>
                    <div class="header-other">
                        <a href="javascript:;" class="other-btn">
                            <span>试用该模板</span>
                        </a>
                        <a href="javascript:;" class="header-img-box" id="web-close">
                            <i class="icon-close"></i>关闭
                        </a>
                    </div>
                </div>
            </header>
            <iframe class="web-box" src="http://www.baidu.com" frameborder="0"></iframe>
        </div>
        <!-- /预览 -->
    </footer>
</div>
@endsection

@section('script')
	<script>
        $(function(){
            $('.product-list').on('click',function(){
                $('#view-box').fadeIn(300);
                $('body').addClass('no-scroll');
            });
            $('#web-close').on('click',function(){
                $('#view-box').fadeOut(300);
                $('body').removeClass('no-scroll');
            });

        });
    </script>
@endsection