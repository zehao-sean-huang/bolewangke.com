@extends('layouts.app')

@section('content')

    <div id="teacher" class="container">
        <div class="jumbotron bg-white box-shadow">
            <div class="media">
                <img class="ml-2 mr-3 border border-info rounded-circle"
                     src="{{ asset('storage/' . $teacher->picture) }}" alt="教师头像" width="100px">
                <div class="media-body">
                    <h3>{{ $teacher->name }}</h3>
                    <p class="lead mb-0">@include('components.tags-row', ['tags' => $teacher->tags])</p>
                    <p class="mt-3"> {{ $teacher->introduction }}</p>
                </div>
            </div>
        </div>
    </div>

    <div id="videos" class="container">
        <div class="card-columns">
            @foreach($teacher->videos as $video)
                @include('components.video-card', ['video' => $video])
            @endforeach
        </div>
    </div>

@endsection
