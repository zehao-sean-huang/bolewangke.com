<div class="card">
    <img class="card-img-top" src="{{ asset('storage/' . $note->thumbnail) }}" alt="{{ $note->name }}">
    <div class="card-body">
        <h5 class="card-title">
            {{ $note->name }}
            <span class="badge badge-info">甄选笔记</span>
            @include('components.tags-row', ['tags' => $note->tags])
        </h5>
        <p class="card-text">{{ $note->introduction }}</p>
        <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <a href="{{ route('note.show', ['id' => $note->id]) }}" class="btn btn-sm btn-outline-secondary">@lang('note.view')</a>
                @can('view', $note)
                    <button class="btn btn-sm btn-outline-secondary" disabled>@lang('note.purchased')</button>
                @elsecan('purchase', $note)
                    <button class="btn btn-sm btn-outline-secondary" data-target="#note-{{ $note->id }}-purchase-confirm" data-toggle="modal">@lang('note.purchase')</button>
                @elseguest
                    <button class="btn btn-sm btn-outline-secondary" data-target="#note-{{ $note->id }}-purchase-confirm" data-toggle="modal">@lang('note.purchase')</button>
                @elsecannot('purchase', $note)
                    <button class="btn btn-sm btn-outline-secondary" disabled>@lang('note.processing')</button>
                @endcannot
            </div>
            @can('purchase', $note)
                @include('components.note-purchase', ['note' => $note])
            @endcan
            @guest()
                @include('components.note-purchase', ['note' => $note])
            @endguest
            <p class="text-light lead">
                <del class="badge badge-info">@lang('note.price', ['price' => $note->originalPrice])</del>
                <span class="badge badge-success">@lang('note.price', ['price' => $note->currentPrice])</span>
            </p>
        </div>
    </div>
</div>
