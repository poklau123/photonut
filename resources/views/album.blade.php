@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="left col-md-3">
                <div class="album-new" data-toggle="modal" data-target="#album-modal">
                    <div style="text-align: center"><i class="iconfont">&#xe60f;</i>添加相册</div>
                </div>
                <div id="album-container">
                    {{-- <div class="album active">
                        <div class="name">旅行</div>
                        <div class="op">
                            <i class="iconfont">&#xe609;</i>
                            <div class="move">
                                <div class="up">
                                    <i class="iconfont">&#xe611;</i>
                                </div>
                                <div class="down">
                                    <i class="iconfont">&#xe62b;</i>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="right col-md-9">
                <div id="upload-container">
                    <div class="card">
                        <img class="card-img-top image">
                        <div class="card-body">
                            <div class="form-group">
                                <input type="file" name="pic" accept="image/*" class="form-control-file pic" id="upload-input-pic">
                            </div>
                            <div class="form-group">
                                <textarea name="title" class="form-control title" cols="30" rows="3"></textarea>
                            </div>
                            <a href="javascript:void(0);" class="btn btn-outline-primary" id="upload"><i class="iconfont">&#xe65c;</i>发布</a>
                        </div>
                    </div>
                </div>
                <div id="post_container">
                {{-- <div class="card post">
                    <img class="card-img-top" src="https://www.runoob.com/wp-content/uploads/2014/06/kittens.jpg">
                    <div class="card-body">
                        <p class="card-text">小猫咪</p>
                        <a href="#" class="btn btn-outline-danger float-md-right">删除</a>
                    </div>
                </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- 模态框 -->
    <div class="modal fade" id="album-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-id="">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                        <div class="form-group">
                          <label class="sr-only" for="name">名称</label>
                          <input type="text" class="form-control" placeholder="请输入名称" autocomplete="off">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-primary" id="album-submit">提交更改</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/template" id="album_view_tpl">
        <div class="album" data-id="">
            <div class="name"></div>
            <div class="op">
                <i class="iconfont edit">&#xe61d;</i>
                <i class="iconfont delete">&#xe65a;</i>
                <div class="move">
                    <div class="up"><i class="iconfont">&#xe611;</i></div>
                    <div class="down"><i class="iconfont">&#xe62b;</i></div>
                </div>
            </div>
        </div>
    </script>
    <script type="text/template" id="post_view_tpl">
        <div class="card post" data-id="">
            <img class="card-img-top" src="" data-origin="">
            <div class="card-body">
              <p class="card-text title"></p>
              <a href="#" class="btn btn-outline-danger float-md-right delete">删除</a>
            </div>
        </div>
    </script>
    <script type="text/template">
    
    </script>
    <script src="{{ mix('js/album.js') }}"></script>
@endsection