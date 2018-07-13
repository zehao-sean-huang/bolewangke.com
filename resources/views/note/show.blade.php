@extends('layouts.app')

@section('content')

    @include('components.alert')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div id="images" class="rounded box-shadow bg-white p-3 mb-4">
                    <h5 class="border-bottom border-gray pb-2 mb-2">@lang('note.detail')</h5>
                    <div id="images-carousel" class="carousel slide rounded" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach($note->exampleImages as $image)
                                <li data-target="#images-carousel" data-slide-to="{{ $loop->index }}"
                                    class="@if(!$loop->index) active @endif"></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($note->exampleImages as $image)
                                <div class="carousel-item @if(!$loop->index) active @endif">
                                    <img class="rounded d-block w-100" src="{{ asset('storage/' . $image) }}" alt="{{ $note->name }}">
                                    <div class="carousel-caption text-right">
                                        <h1>{{ $note->name }}</h1>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#images-carousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#images-carousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div id="info" class="rounded box-shadow bg-white p-3 mb-4">
                    <h5 class="border-bottom border-gray pb-2 mb-0">@lang('note.info')</h5>
                    <div class="my-2">
                        <img src="{{ asset('storage/' . $note->thumbnail) }}" alt="{{ $note->name }}" class="rounded" width="100%">
                    </div>
                    <dl class="row">
                        <dt class="col-4">{{ $note->name }}</dt>
                        <dd class="col-8">{{ $note->introduction }}</dd>
                        <dt class="col-4">售价</dt>
                        <dd class="col-8">
                            <del class="badge badge-info">@lang('video.price', ['price' => $note->originalPrice])</del>
                            <span class="badge badge-success">@lang('video.price', ['price' => $note->currentPrice])</span>
                        </dd>
                        <dt class="col-4">购买方式</dt>
                        <dd class="col-8">
                            请加客服QQ{{ env('SERVICE_QQ') }}，说明您要购买<strong>{{ $note->id }}</strong>号笔记即可。
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

@endsection