@extends('layouts.app')

@section('content')

    <div id="tag" class="container mb-2">
        <h3>
            {{ $tag->name }}
            <small class="text-muted">相关课程、视频和笔记</small>
        </h3>
    </div>

    <div id="taggables" class="container">
        @if($tag->itemsCount)
            <div class="card-columns">
                @foreach($tag->videos as $video)
                    @include('components.video-card', ['video' => $video])
                @endforeach
                @foreach($tag->courses as $course)
                    @include('components.video-card', ['course' => $course])
                @endforeach
                @foreach($tag->notes as $note)
                    @include('components.video-card', ['note' => $note])
                @endforeach
            </div>
        @else
            <div class="jumbotron bg-white box-shadow">
                <h1 class="display-4">抱歉</h1>
                <hr class="my-4"/>
                <p class="lead">
                    标签<span class="text-danger">{{ $tag->name }}</span>暂无内容，请您点击下方其它标签进行浏览。
                </p>
            </div>
        @endif
    </div>

    <div class="container">
        <div id="ordered" class="rounded box-shadow bg-white p-3 mb-4">
            <h5 class="border-bottom border-gray pb-2 mb-2">其他索引</h5>
            <p class="lead mb-0">@include('components.tags-row', ['tags' => $tags])</p>
        </div>
    </div>

@endsection