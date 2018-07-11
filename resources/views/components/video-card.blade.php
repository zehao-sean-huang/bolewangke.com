<div class="card">
    <img class="card-img-top" src="{{ asset('storage/' . $video->thumbnail) }}" alt="{{ $video->name }}">
    <div class="card-body">
        <h5 class="card-title">{{ $video->name }}</h5>
        <p class="card-text">{{ $video->introduction }}</p>
        <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <a href="{{ route('video.show', ['id' => $video->id]) }}" class="btn btn-sm btn-outline-secondary">@lang('video.view')</a>
                @if(!$video->public)
                    @can('view', $video)
                        <button class="btn btn-sm btn-outline-secondary" disabled>@lang('video.purchased')</button>
                    @elsecan('purchase', $video)
                        <button class="btn btn-sm btn-outline-secondary" data-target="#video-{{ $video->id }}-purchase-confirm" data-toggle="modal">@lang('video.purchase')</button>
                    @elseguest
                        <button class="btn btn-sm btn-outline-secondary" data-target="#video-{{ $video->id }}-purchase-confirm" data-toggle="modal">@lang('video.purchase')</button>
                    @elsecannot('purchase', $video)
                        <button class="btn btn-sm btn-outline-secondary" disabled>@lang('video.processing')</button>
                    @endcannot
                @endif

            </div>
            @if($video->public)
                <p class="text-light lead">
                    <span class="badge badge-primary">@lang('video.free')</span>
                </p>
            @else
                @can('purchase', $video)
                    @include('components.video-purchase', ['video' => $video])
                @endcan
                @guest()
                    @include('components.video-purchase', ['video' => $video])
                @endguest
                <p class="text-light lead">
                    <del class="badge badge-info">@lang('video.price', ['price' => $video->originalPrice])</del>
                    <span class="badge badge-success">@lang('video.price', ['price' => $video->currentPrice])</span>
                </p>
            @endif
        </div>
    </div>
</div>
