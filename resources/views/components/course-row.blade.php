<div class="media border-bottom pb-2 mb-2">
    <a href="{{ route('course.show', ['id' => $course->id]) }}">
        <img class="mr-3 rounded" width="175px" src="{{ asset('storage/' . $course->thumbnail) }}" alt="{{ $course->name }}">
    </a>
    <div class="media-body" style="height: 100%;">
        <h6 class="mt-1 mb-2">
            <a href="{{ route('course.show', ['id' => $course->id]) }}" class="text-secondary">{{ $course->name }}</a>
            <del class="badge badge-info">@lang('course.price', ['price' => $course->originalPrice])</del>
            <span class="badge badge-success">@lang('course.price', ['price' => $course->currentPrice])</span>
        </h6>
        @include('components.tags-row', ['tags' => $course->tags])
        <p class="mb-0 lead">
            @can('view', $course)
                <button class="btn btn-sm btn-outline-secondary" disabled>@lang('course.purchased')</button>
            @elsecan('purchase', $course)
                <button class="btn btn-sm btn-outline-secondary" data-target="#course-{{ $course->id }}-purchase-confirm" data-toggle="modal">@lang('course.purchase')</button>
            @elseguest
                <button class="btn btn-sm btn-outline-secondary" data-target="#course-{{ $course->id }}-purchase-confirm" data-toggle="modal">@lang('course.purchase')</button>
            @elsecannot('purchase', $course)
                <button class="btn btn-sm btn-outline-secondary" disabled>@lang('course.processing')</button>
            @endcannot
        </p>
        @can('purchase', $course)
            @include('components.course-purchase', ['course' => $course])
        @endcan
    </div>
</div>