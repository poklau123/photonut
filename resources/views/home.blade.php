@extends('layouts.app')

@section('content')
    <div class="page-index">
        <!-- /header -->
        <div id="fullpage">
            <!-- 第一页 -->
            <div class="section page1" data-anchor="page1">
                <div class="page1-box">
                    <p class="section-title">开启自己的摄影网站</p>
                    <div class="desc">
                        <p>在PhotoNut的帮助下，您只需要简单的几个步骤，</p>
                        <p>就能拥有属于您自己的专业摄影网站，展示您的作品。</p>
                    </div>
                    <div class="tel-box">
                        <input type="text" placeholder="请输入您的手机号" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="11"><a href="/register" class="btn">马上开启</a>
                    </div>
                </div>
                <a href="#page2" class="arrow"><i class="icon-arrow"></i></a>
            </div>
            <!-- /第一页 -->
            <!-- 第二页 -->
            <div class="section page2" data-anchor="page2">
                <div class="page2-box">
                    <p class="section-title">您的作品</p>
                    <p class="sm-section-title">需要一款适合的风格模板</p>
                    <div class="desc">
                        <p>我们提供数十种风格的模板，作为一名专业摄影师，一款合适的模板可以更好的</p>
                        <p>把您的作品更好的展示给您的客户。</p>
                    </div>
                    <a href="#" class="btn">去看看</a>
                </div>
                <a href="#page3" class="arrow"><i class="icon-arrow"></i></a>
            </div>
            <!-- /第二页 -->
            <!-- 第三页 -->
            <div class="section page3" data-anchor="page3">
                <div class="page3-box">
                    <p class="section-title">快速搭建</p>
                    <p class="section-title">容易管理</p>
                    <div class="desc">
                        <p>PhotoNut提供高效配置管理工具和编辑器，</p>
                        <p>无需开发经验就可对站点做个性化的调整。</p>
                    </div>
                    <a href="#" class="btn">去看看</a>
                </div>
                <a href="#page4" class="arrow"><i class="icon-arrow"></i></a>
            </div>
            <!-- /第三页 -->
            <!-- 第四页 -->
            <div class="section page4" data-anchor="page4">
                <div class="page4-box">
                    <p class="section-title">在线帮助(24/7)</p>
                    <div class="desc">
                        <p>您在使用过程中遇到的问题，我们时刻准备帮您解答。</p>
                    </div>
                    <a href="#" class="btn">去看看</a>
                </div>
                <a href="#page5" class="arrow"><i class="icon-arrow"></i></a>
            </div>
            <!-- /第四页 -->
            <!-- 第五页 -->
            <div class="section page5" data-anchor="page5">
                <p class="section-title">开始免费试用</p>
                <div class="tel-box">
                    <input type="text" placeholder="请输入您的手机号" oninput="this.value = this.value.replace(/\D/g, '')" maxlength="11"><a href="#" class="btn">马上开启</a>
                </div>
            </div>
            <!-- /第五页 -->
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.9.7/vendors/jquery.easings.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.9.7/jquery.fullpage.min.js"></script>

    <script>
        $(function(){
            $('.page1-box').addClass('page1-show');
            $('#fullpage').fullpage({
                navigation:true,
                afterLoad:function(index){
                    if(index == 'page5'){
                        $('.page5').find('.btn').addClass('sm');
                        return false;
                    }
                    $('.' + index + '-box').addClass('show');
                }
            });
        });
    </script>    
@endsection
