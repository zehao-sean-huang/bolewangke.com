@if(session('title'))
    <div class="container">
        <div class="alert alert-{{ session('status') }} alert-dismissible fade show" role="alert">
            <h5 class="alert-heading pt-2">{{ session('title') }}</h5>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <hr>
            <p>{{ session('detail') }}</p>
        </div>
    </div>
@endif