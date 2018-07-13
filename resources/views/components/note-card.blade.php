<div class="card">
    <img class="card-img-top" src="{{ asset('storage/' . $note->thumbnail) }}" alt="{{ $note->name }}">
    <div class="card-body">
        <h5 class="card-title">
            {{ $note->name }}
            <span class="badge badge-info">甄选笔记</span>
        </h5>
        <p class="card-text">{{ $note->introduction }}</p>
        <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <a href="{{ route('note.show', ['id' => $note->id]) }}" class="btn btn-sm btn-outline-secondary">@lang('note.view')</a>
            </div>
            <p class="text-light lead">
                <del class="badge badge-info">@lang('video.price', ['price' => $note->originalPrice])</del>
                <span class="badge badge-success">@lang('video.price', ['price' => $note->currentPrice])</span>
            </p>
        </div>
    </div>
</div>
