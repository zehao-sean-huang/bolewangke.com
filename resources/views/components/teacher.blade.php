<div class="col-sm-4 text-center mt-4 pl-2 pr-2 mb-3">
    <a href="{{ route('teacher.show', ['teacher' => $teacher->id]) }}">
        <img class="rounded-circle mb-2" src="{{ asset('storage/' . $teacher->picture) }}" alt="导师头像" width="140px" height="140px"></a>
    <div class="mt-3 mb-2" style="overflow : hidden;text-overflow: ellipsis;display: -webkit-box; -webkit-line-clamp: 1;-webkit-box-orient: vertical;height:25px;">
        <h5>
            <a href="{{ route('teacher.show', ['teacher' => $teacher->id]) }}" class="text-info">{{ $teacher->name }}</a>
        </h5>
    </div>
    <div>
        <p class="small" style="margin-left: 10%;margin-right: 10%; ; text-align:justify; text-justify:inter-ideograph; align-self: center">{{ $teacher->introduction }}</p>
    </div>
</div>