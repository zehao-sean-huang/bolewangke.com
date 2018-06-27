<div class="card">
    <img class="card-img-top" src="{{ asset('storage/' . $video->thumbnail) }}" alt="{{ $video->name }}">
    <div class="card-body">
        <h5 class="card-title">{{ $video->name }}</h5>
        <p class="card-text">{{ $video->introduction }}</p>
        <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <a href="{{ route('video.show', ['id' => $video->id]) }}" class="btn btn-sm btn-outline-secondary">查看课程</a>
                {{--<a href="{{ route('agency.applicant.index', ['id' => $agency->id]) }}" class="btn btn-sm btn-outline-secondary">案例</a>--}}
            </div>
            @if($video->public)
                <p class="text-light text-lg-right badge badge-warning">免费公开课</p>
            @else
                <p class="text-light text-lg-right badge badge-info">{{ $video->price }}元</p>
            @endif
        </div>
    </div>
</div>