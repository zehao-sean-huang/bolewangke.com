@extends('layouts.app')

@section('content')

    <section class="jumbotron text-center bg-white">
        <div class="container">
            <h1 class="jumbotron-heading">全部课程一览</h1>
            <p class="lead text-muted">成为我们的用户后，您可以查看我们所有的免费课程，并获得我们课程小助手一对一的指导建议，选择您需要的课程进行试听。</p>
            <p>
                @auth()
                    <a href="{{ route('home') }}" class="btn btn-primary my-2">个人中心</a>
                @elseguest()
                    <a href="{{ route('register') }}" class="btn btn-primary my-2">注册</a>
                    <a href="{{ route('login') }}" class="btn btn-secondary my-2">登录</a>
                @endguest
            </p>
        </div>
    </section>
    @include('components.alert')
    <div class="container">
        <div class="card-columns">
            @foreach($courses as $course)
                @include('components.course-card', ['course' => $course])
            @endforeach
            @foreach($videos as $video)
                @include('components.video-card', ['video' => $video])
            @endforeach
        </div>
    </div>

@endsection