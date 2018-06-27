@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div id="account" class="mb-4">
                    <div class="p-3 bg-white rounded box-shadow">
                        <h5 class="border-bottom border-gray pb-2 mb-2">账号信息</h5>
                        <dl class="row">
                            <dt class="col-sm-4">账号名称</dt>
                            <dd class="col-sm-8">{{ Auth::user()->name }}</dd>
                            <dt class="col-sm-4">登录邮箱</dt>
                            <dd class="col-sm-8">{{ Auth::user()->email }}</dd>
                        </dl>
                        <button type="button" class="btn btn-sm btn-outline-danger btn-block" data-toggle="tooltip"
                                data-placement="bottom" title="退出登录，点击忘记密码，接收邮件重置密码。">
                            修改密码
                        </button>
                    </div>
                </div>
                <div id="agency" class="mb-4">
                    <div class="p-3 bg-white rounded box-shadow">
                        <h5 class="border-bottom border-gray pb-2 mb-2">联系方式</h5>
                        <dl class="row">
                            <dt class="col-sm-4">微信号</dt>
                            <dd class="col-sm-8">TO BE DEVELOPED</dd>
                            <dt class="col-sm-4">手机号</dt>
                            <dd class="col-sm-8">TO BE DEVELOPED</dd>
                        </dl>
                        <a class="btn btn-sm btn-outline-warning btn-block" href="#">编辑</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mb-4">
                <div id="subscribed-videos" class="p-3 bg-white rounded box-shadow mb-4">
                    <h5 class="border-bottom border-gray pb-2 mb-0">我订阅的视频</h5>
                    <div class="card-columns">
                        @foreach (Auth::user()->subscribedVideos as $video)
                            Video???
                        @endforeach
                    </div>
                    <small class="d-block text-right mt-3">
                        <a class="btn btn-sm btn-block btn-outline-info" href="{{ route('video.index') }}">浏览所有课程</a>
                    </small>
                </div>
                <h5 class="pb-2 mb-0">全部体验课程</h5>
                <div class="card-columns mt-2">
                    @foreach($publicVideos as $video)
                        @include('components.video-card', ['video' => $video])
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

