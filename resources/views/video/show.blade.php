@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div id="video" class="rounded box-shadow bg-white p-3 mb-4">
                    <h5 class="border-bottom border-gray pb-2 mb-0">@lang('video.watch')</h5>
                    @can('view', $video)
                        <div class="embed-responsive embed-responsive-16by9 mt-2">
                            <iframe src="//{{ env('QCLOUD_APP_ID') }}.vod2.myqcloud.com/vod-player/{{ env('QCLOUD_APP_ID') }}/{{ $video->file_id }}/tcplayer/console/vod-player.html?autoplay=false&width=3840&height=2160"
                                    class="embed-responsive-item" frameborder="0" scrolling="no" allowfullscreen>
                            </iframe>
                        </div>
                    @else
                        <div class="jumbotron mt-2 bg-white">
                            <h1 class="display-4">@lang('video.sorry')</h1>
                            <p class="lead">
                                @lang('video.unauthorized')
                                @if($video->public)
                                    @lang('video.public')
                                @endif
                                @guest()
                                    @lang('video.guest')
                                @endguest
                                @auth
                                    @can('purchase', $video)
                                        @lang('video.unpurchased')<a data-toggle="modal" data-target="#video-{{ $video->id }}-purchase-confirm" href="#video-{{ $video->id }}-purchase-confirm">@lang('video.purchase')</a>
                                        @include('components.video-purchase', ['video' => $video])
                                    @endcan
                                    @cannot('purchase', $video)
                                        @lang('purchase.processing')
                                    @endcannot
                                @endauth
                            </p>
                            <hr class="my-4">
                            <a class="btn btn-primary btn-lg" href="{{ route('home') }}" role="link">个人中心</a>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div id="info" class="rounded box-shadow bg-white p-3 mb-4">
                    <h5 class="border-bottom border-gray pb-2 mb-0">@lang('video.info')</h5>
                    <div class="my-2">
                        <img src="{{ asset('storage/' . $video->thumbnail) }}" alt="{{ $video->name }}" class="rounded" width="100%">
                    </div>
                    <dl class="row">
                        <dt class="col-4">@lang('video.name')</dt>
                        <dd class="col-8">{{ $video->name }}</dd>
                        <dt class="col-4">@lang('video.introduction')</dt>
                        <dd class="col-8">{{ $video->introduction }}</dd>
                    </dl>
                </div>
                <div id="teachers" class="rounded box-shadow bg-white p-3 mb-4">
                    <h5 class="border-bottom border-gray pb-2 mb-0">@lang('video.teachers')</h5>
                    @foreach($video->teachers as $teacher)
                        <div class="media my-2">
                            <a href="{{ route('teacher.show', ['id' => $teacher->id]) }}">
                                <img class="mr-3 img-thumbnail" width="50px" src="{{ asset('storage/' . $teacher->picture) }}" alt="{{ $teacher->name }}">
                            </a>
                            <div class="media-body border-bottom border-gray">
                                <h6 class="mt-1 mb-2">
                                    <a href="{{ route('teacher.show', ['id' => $teacher->id]) }}">{{ $teacher->name }}</a>
                                </h6>
                                <p class="small">{{ $teacher->introduction }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
