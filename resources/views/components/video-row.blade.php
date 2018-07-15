<div class="media border-bottom pb-2 mb-2">
    <a href="{{ route('video.show', ['id' => $video->id]) }}">
        <img class="mr-3 rounded" width="175px" src="{{ asset('storage/' . $video->thumbnail) }}" alt="{{ $video->name }}">
    </a>
    <div class="media-body" style="height: 100%;">
        <h6 class="mt-1 mb-2">
            <a href="{{ route('video.show', ['id' => $video->id]) }}" class="text-secondary">{{ $video->name }}</a>
            @if($video->public)
                <span class="badge badge-primary">@lang('video.free')</span>
            @else
                <del class="badge badge-info">@lang('video.price', ['price' => $video->originalPrice])</del>
                <span class="badge badge-success">@lang('video.price', ['price' => $video->currentPrice])</span>
            @endif
        </h6>
        @include('components.tags-row', ['tags' => $video->tags])
        <p class="mb-0 lead">
            @if(!$video->public)
                @if($video->published)
                    @can('view', $video)
                        <button class="btn btn-sm btn-outline-secondary" disabled>@lang('video.purchased')</button>
                    @elsecan('purchase', $video)
                        <button class="btn btn-sm btn-outline-secondary" data-target="#video-{{ $video->id }}-purchase-confirm" data-toggle="modal">@lang('video.purchase')</button>
                    @elseguest
                        <button class="btn btn-sm btn-outline-secondary" data-target="#video-{{ $video->id }}-purchase-confirm" data-toggle="modal">@lang('video.purchase')</button>
                    @elsecannot('purchase', $video)
                        <button class="btn btn-sm btn-outline-secondary" disabled>@lang('video.processing')</button>
                    @endcannot
                @else
                    <button class="btn btn-sm btn-outline-secondary" disabled>@lang('video.unpublished')</button>
                @endif
            @endif
        </p>
        @if(!$video->public)
            @can('purchase', $video)
                @include('components.video-purchase', ['video' => $video])
            @endcan
        @endif
    </div>
</div>