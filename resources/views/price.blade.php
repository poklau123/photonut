@extends('layouts.app')

@section('content')
    <div class="page-price">
        <div class="lt-grid">
            <p class="type-title">选择适合的套餐</p>
            <div class="type-box fn-clear">
                <div class="type-item">
                    <div class="type-header">
                        <h2>免费版 Free</h2>
                        <p class="type-money-box"><span class="type-symbol">￥</span><span class="type-money">0</span><span class="type-unit">/月</span></p>
                    </div>
                    <img width="100%" src="../dest/img/circle.jpg" alt="">
                    <a class="type-btn" href="#">立即注册</a>
                    <ul class="type-service">
                        <li>
                            <i class="icon-chose"></i>20张图片
                        </li>
                        <li>
                            <i class="icon-chose"></i>3个页面
                        </li>
                        <li>
                            <i class="icon-unchose"></i>无限高级模板
                        </li>
                        <li>
                            <i class="icon-unchose"></i>个人域名绑定
                        </li>
                        <li>
                            <i class="icon-unchose"></i>css+html自定义
                        </li>
                    </ul>
                </div>
                <div class="type-item">
                    <div class="type-header">
                        <h2>基础版 Basic</h2>
                        <p class="type-money-box"><span class="type-symbol">￥</span><span class="type-money">88</span><span class="type-unit">/月</span></p>
                        <p class="sm-type-money-box"><span class="type-symbol">￥</span><span class="type-money">888</span><span class="type-unit">/年</span></p>
                    </div>
                    <img width="100%" src="../dest/img/circle.jpg" alt="">
                    <a class="type-btn" href="#">免费试用30天</a>
                    <ul class="type-service">
                        <li>
                            <i class="icon-chose"></i>无限图片
                        </li>
                        <li>
                            <i class="icon-chose"></i>无限页面
                        </li>
                        <li>
                            <i class="icon-chose"></i>免费高级模板
                        </li>
                        <li>
                            <i class="icon-chose"></i>个人域名绑定
                        </li>
                        <li>
                            <i class="icon-chose"></i>css+html自定义
                        </li>
                    </ul>
                </div>
                <div class="type-item">
                    <div class="type-header">
                        <h2>专业版 Pro</h2>
                        <p class="type-money-box"><span class="type-symbol">￥</span><span class="type-money">188</span><span class="type-unit">/月</span></p>
                        <p class="sm-type-money-box"><span class="type-symbol">￥</span><span class="type-money">1888</span><span class="type-unit">/年</span></p>
                    </div>
                    <img width="100%" src="../dest/img/circle.jpg" alt="">
                    <a class="type-btn" href="#">免费试用30天</a>
                    <ul class="type-service">
                        <li>
                            <i class="icon-chose"></i>无限图片
                        </li>
                        <li>
                            <i class="icon-chose"></i>无限页面
                        </li>
                        <li>
                            <i class="icon-chose"></i>免费高级模板
                        </li>
                        <li>
                            <i class="icon-chose"></i>个人域名绑定
                        </li>
                        <li>
                            <i class="icon-chose"></i>css+html自定义
                        </li>
                    </ul>
                </div>
            </div>
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
        </footer>
    </div>
@endsection