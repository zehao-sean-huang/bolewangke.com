@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div id="info" class="rounded box-shadow bg-white p-3 mb-4">
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="课程封面图" width="100%" class="rounded">
                    </div>
                    <div class="mb-2">
                        <div style="overflow: hidden">
                            <h3 class="float-left">{{ $course->name }}</h3>
                            <button role="button" class="btn btn-outline-danger float-right">打包购买</button>
                        </div>
                        <p class="mb-0 lead">
                            <del class="badge badge-info">￥{{ $course->originalPrice }}</del>
                            <span class="badge badge-success">￥{{ $course->currentPrice }}</span>
                        </p>
                        <p>{{ count($course->videos) }}个视频，{{ count($course->teachers) }}位导师参与制作</p>
                    </div>
                    @foreach($course->teachers as $teacher)
                        <div class="media mx-2 border-top py-2">
                            <a href="{{ route('teacher.show', ['teacher' => $teacher->id]) }}">
                                <img class="mr-3 rounded-circle" width="50px" src="{{ asset('storage/' . $teacher->picture) }}">
                            </a>
                            <div class="media-body">
                                <h6 class="mt-1 mb-2">
                                    <a href="{{ route('teacher.show', ['teacher' => $teacher->id]) }}" class="text-secondary">{{ $teacher->name }}</a>
                                </h6>
                                <p class="small mb-0">
                                    {{ $teacher->introduction }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-8">
                <div id="videos" class="rounded box-shadow bg-white p-3 mb-4">
                    @foreach($course->videos as $video)
                        @include('components.video-row', ['video' => $video])
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
