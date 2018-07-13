<div class="card">
    <img class="card-img-top" src="{{ asset('storage/' . $course->thumbnail) }}" alt="{{ $course->name }}">
    <div class="card-body">
        <h5 class="card-title">
            {{ $course->name }}
            <span class="badge badge-info">课程套装</span>
            <span class="badge badge-secondary">@lang('course.video_count', ['video_count' => $course->videos->count()])</span>
        </h5>
        <p class="card-text">{{ $course->introduction }}</p>
        <p class="card-text">{{ $course->teachers }}</p>
        <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <a href="{{ route('course.show', ['id' => $course->id]) }}" class="btn btn-sm btn-outline-secondary">@lang('course.view')</a>
                @can('view', $course)
                    <button class="btn btn-sm btn-outline-secondary" disabled>@lang('video.purchased')</button>
                @elsecan('purchase', $course)
                    <button class="btn btn-sm btn-outline-secondary" data-target="#course-{{ $course->id }}-purchase-confirm" data-toggle="modal">@lang('course.purchase')</button>
                @elseguest
                    <button class="btn btn-sm btn-outline-secondary" data-target="#course-{{ $course->id }}-purchase-confirm" data-toggle="modal">@lang('course.purchase')</button>
                @elsecannot('purchase', $course)
                    <button class="btn btn-sm btn-outline-secondary" disabled>@lang('course.processing')</button>
                @endcannot
            </div>
            <p class="text-light lead">
                <del class="badge badge-info">@lang('video.price', ['price' => $course->originalPrice])</del>
                <span class="badge badge-success">@lang('video.price', ['price' => $course->currentPrice])</span>
            </p>
            @can('purchase', $course)
                @include('components.course-purchase', ['video' => $course])
            @endcan
            @guest()
                @include('components.course-purchase', ['video' => $course])
            @endguest
        </div>
    </div>
</div>
