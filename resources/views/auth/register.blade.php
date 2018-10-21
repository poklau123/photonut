@extends('layouts.manage')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">注册</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">手机号</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">验证码</label>

                            <div class="col-md-4">
                                <input id="code" type="code" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" required>
                                @if ($errors->has('code'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                @php
                                    $wait_time = session()->get('wait_time')    
                                @endphp
                                @if(is_null($wait_time))
                                    <button type="button" class="btn btn-primary" id="btn_code">获取验证码</button>
                                @else
                                    <button type="button" class="btn btn-primary redo" id="btn_code" data-time="{{ $wait_time }}" disabled>{{ "重新发送($wait_time)" }}</button>
                                @endif                               
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    注册
                                </button>
                            </div>
                        </div>
                    </form>

                    <form id="verify-form" action="{{ route('/auth/code') }}" method="POST" style="display: none;">
                        @csrf
                        <input type="text" name="phone">    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        (function(){
            var search = window.location.search;
            if(search.length > 0 && search.length % 2 === 0){
                var arr = search.substr(1).split('=');
                var obj = {};
                for(var i = 0; i < arr.length; i+=2){
                    obj[arr[i]] = arr[i+1];
                }
                $('#phone').val(obj.phone)
            }
        })();
    </script>
@endsection
