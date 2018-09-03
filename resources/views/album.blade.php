@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="left col-md-3" id="album-container">
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
            <div class="right col-md-9">
                567
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/template" id="album_view_tpl">
        <div class="album" data-id="">
            <div class="name"></div>
            <div class="op">
                <i class="iconfont">&#xe609;</i>
                <div class="move">
                    <div class="up"><i class="iconfont">&#xe611;</i></div>
                    <div class="down"><i class="iconfont">&#xe62b;</i></div>
                </div>
            </div>
        </div>
    </script>
    <script src="{{ mix('js/album.js') }}"></script>
@endsection