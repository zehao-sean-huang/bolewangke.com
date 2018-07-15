@foreach($tags as $anotherTag)
    <a href="{{ route('tag.show', ['id' => $anotherTag->id]) }}">
        <u class="badge badge-info">{{ $anotherTag->name }}</u>
    </a>
@endforeach