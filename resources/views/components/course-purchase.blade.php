<div class="modal fade" id="course-{{ $course->id }}-purchase-confirm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">@lang('purchase.confirm')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="{{ $course->name }}" width="100%" class="rounded">
                <p>@lang('purchase.introduction', ['name' => $course->name, 'originalPrice' => $course->originalPrice, 'currentPrice' => $course->currentPrice])</p>
                <p>@lang('purchase.vip')</p>
            </div>
            <div class="modal-footer">
                <a href="{{ route('course.order', ['id' => $course->id]) }}" class="btn btn-primary @cannot('purchase', $course) disabled @endcannot">
                    @guest
                        @lang('purchase.guest')
                    @endguest
                    @auth()
                        @can('purchase', $course)@lang('purchase.confirm')@endcan
                        @cannot('purchase', $course)@lang('purchase.processing')@endcannot
                    @endauth
                </a>
            </div>
        </div>
    </div>
</div>