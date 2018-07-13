<div style="overflow: hidden;">
    @foreach($teachers as $teacher)
        <div class="float-left text-center mx-1">
            <a href="{{ route('teacher.show', ['teacher' => $teacher->id]) }}">
                <img src="{{ asset('storage/' . $teacher->picture) }}" class="rounded-circle"
                     alt="{{ $teacher->name }}" width="50px">
            </a>
            <p class="mb-0">
                <a class="text-secondary" href="{{ route('teacher.show', ['teacher' => $teacher->id]) }}">
                    {{ $teacher->name }}
                </a>
            </p>
        </div>
    @endforeach
</div>