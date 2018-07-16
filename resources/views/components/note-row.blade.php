<div class="media border-bottom pb-2 mb-2">
    <a href="{{ route('note.show', ['id' => $note->id]) }}">
        <img class="mr-3 rounded" width="175px" src="{{ asset('storage/' . $note->thumbnail) }}" alt="{{ $note->name }}">
    </a>
    <div class="media-body" style="height: 100%;">
        <h6 class="mt-1 mb-2">
            <a href="{{ route('note.show', ['id' => $note->id]) }}" class="text-secondary">{{ $note->name }}</a>
            <del class="badge badge-info">@lang('note.price', ['price' => $note->originalPrice])</del>
            <span class="badge badge-success">@lang('note.price', ['price' => $note->currentPrice])</span>
        </h6>
        @include('components.tags-row', ['tags' => $note->tags])
        <p class="mb-0 lead">
            @can('view', $note)
                <button class="btn btn-sm btn-outline-secondary" disabled>@lang('note.purchased')</button>
            @elsecan('purchase', $note)
                <button class="btn btn-sm btn-outline-secondary" data-target="#note-{{ $note->id }}-purchase-confirm" data-toggle="modal">@lang('note.purchase')</button>
            @elseguest
                <button class="btn btn-sm btn-outline-secondary" data-target="#note-{{ $note->id }}-purchase-confirm" data-toggle="modal">@lang('note.purchase')</button>
            @elsecannot('purchase', $note)
                <button class="btn btn-sm btn-outline-secondary" disabled>@lang('note.processing')</button>
            @endcannot
        </p>
        @can('purchase', $note)
            @include('components.note-purchase', ['note' => $note])
        @endcan
    </div>
</div>