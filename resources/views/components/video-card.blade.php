<div class="card">
    <img class="card-img-top" src="{{ asset('storage/' . $video->thumbnail) }}" alt="{{ $video->name }}">
    <div class="card-body">
        <h5 class="card-title">{{ $video->name }}</h5>
        <p class="card-text">{{ $video->introduction }}</p>
        <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <a href="{{ route('video.show', ['id' => $video->id]) }}" class="btn btn-sm btn-outline-secondary">查看课程</a>
            </div>
            @if($video->public)
                <p class="text-light lead">
                    <span class="badge badge-secondary">免费视频</span>
                </p>
            @else
                <p class="text-light lead">
                    <del class="badge badge-info">￥{{ $video->originalPrice }}</del>
                    <span class="badge badge-success">￥{{ $video->currentPrice }}</span>
                </p>
            @endif
        </div>
    </div>
</div>
