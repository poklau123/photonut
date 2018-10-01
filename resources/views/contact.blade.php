@extends('layouts.app')

@section('content')

    <div class="container">
        <form action="/contact" method="post" enctype="multipart/form-data">
            <div class="form-group form-horizontal">
              <label for="pic">我的照片:</label>
              <input type="file" class="form-control-file" name="pic" id="pic" placeholder="点击上传照片" aria-describedby="fileHelpId">
              @if ($user->pic)
                <small id="fileHelpId" class="form-text text-muted">选择图片并提交会覆盖现有图片</small>                  
              @endif
            </div>
            <div class="form-group">
              <label for="desc">我的简介</label>
              <textarea class="form-control" name="desc" id="desc" rows="3" style="height: auto">{{ $user->desc }}</textarea>
            </div>
            <a name="submit" id="submit" class="btn btn-primary" href="#" role="button">提交</a>
        </form>
    </div>
    
@endsection

@section('script')
    <script src="{{ mix('js/contact.js') }}"></script>
@endsection