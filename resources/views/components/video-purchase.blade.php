<div class="modal fade" id="video-{{ $video->id }}-purchase-confirm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">@lang('purchase.confirm')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('storage/' . $video->thumbnail) }}" alt="{{ $video->name }}" width="100%" class="rounded">
                <p>@lang('purchase.introduction', ['name' => $video->name, 'originalPrice' => $video->originalPrice, 'currentPrice' => $video->currentPrice])</p>
                <p>@lang('purchase.vip')</p>
            </div>
            <div class="modal-footer">
                <a href="{{ route('video.order', ['id' => $video->id]) }}" class="btn btn-primary @cannot('purchase', $video) disabled @endcannot">
                    @guest
                        @lang('purchase.guest')
                    @endguest
                    @auth()
                        @can('purchase', $video)@lang('purchase.confirm')@endcan
                        @cannot('purchase', $video)@lang('purchase.processing')@endcannot
                    @endauth
                </a>
                @guest()
                    <a href="{{ route('login') }}">登录</a>
                    <a href="{{ route('register') }}">注册</a>
                @endguest
            </div>
        </div>
    </div>
</div>