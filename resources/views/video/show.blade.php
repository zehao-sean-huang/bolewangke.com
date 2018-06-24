@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div id="video" class="rounded box-shadow bg-white p-3 mb-4">
                    <h5 class="border-bottom border-gray pb-2 mb-0">观看视频</h5>
                    @can('view', $video)
                        <div class="embed-responsive embed-responsive-16by9 mt-2">
                            <iframe src="//{{ env('QCLOUD_APP_ID') }}.vod2.myqcloud.com/vod-player/{{ env('QCLOUD_APP_ID') }}/{{ $video->file_id }}/tcplayer/console/vod-player.html?autoplay=false&width=3840&height=2160"
                                    class="embed-responsive-item" frameborder="0" scrolling="no" allowfullscreen >
                            </iframe>
                        </div>
                    @else

                    @endcan
                </div>
            </div>
            <div class="col-md-4">
                <div id="info" class="rounded box-shadow bg-white p-3 mb-4">
                    <h5 class="border-bottom border-gray pb-2 mb-0">课程信息</h5>
                    <div class="my-2">
                        <img src="{{ asset('storage/' . $video->thumbnail) }}" alt="视频封面图" class="img-thumbnail border-info">
                    </div>
                    <dl class="row">
                        <dt class="col-4">课程名称</dt>
                        <dd class="col-8">{{ $video->name }}</dd>
                        <dt class="col-4">课程介绍</dt>
                        <dd class="col-8">{{ $video->introduction }}</dd>
                    </dl>
                </div>
                <div id="teachers" class="rounded box-shadow bg-white p-3 mb-4">
                    <h5 class="border-bottom border-gray pb-2 mb-0">授课导师</h5>
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
    </div>

@endsection