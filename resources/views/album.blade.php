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
                567
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
                <i class="iconfont edit">&#xe609;</i>
                <div class="move">
                    <div class="up"><i class="iconfont">&#xe611;</i></div>
                    <div class="down"><i class="iconfont">&#xe62b;</i></div>
                </div>
            </div>
        </div>
    </script>
    <script>

    </script>
    <script src="{{ mix('js/album.js') }}"></script>
@endsection