<div class="modal fade" id="note-{{ $note->id }}-purchase-confirm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" action="{{ route('note.order', ['id' => $note->id]) }}" method="get">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">@lang('purchase.confirm')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('storage/' . $note->thumbnail) }}" alt="{{ $note->name }}" width="100%" class="rounded">
                <p>@lang('note.purchasing.introduction', ['name' => $note->name, 'originalPrice' => $note->originalPrice, 'currentPrice' => $note->currentPrice])</p>
                @auth()
                    @if(!Auth::user()->contactAvailable)
                        <div id="ordered" class="rounded box-shadow bg-white p-3 mb-4">
                            @include('components.alert')
                            <div class="form-group row">
                                <label for="mobile" class="col-sm-4 col-form-label text-md-right">手机号</label>
                                <div class="col-md-6">
                                    <input id="mobile" type="tel" class="form-control" name="user[mobile]" value="{{ Auth::user()->mobile }}" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="qq" class="col-sm-4 col-form-label text-md-right">QQ号</label>
                                <div class="col-md-6">
                                    <input id="qq" type="tel" class="form-control" name="user[qq]" value="{{ Auth::user()->qq }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-sm-4 col-form-label text-md-right">地址</label>
                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="user[address]" value="{{ Auth::user()->address }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="real_name" class="col-sm-4 col-form-label text-md-right">真实姓名</label>
                                <div class="col-md-6">
                                    <input id="real_name" type="text" class="form-control" name="user[real_name]" value="{{ Auth::user()->real_name }}" required>
                                </div>
                            </div>
                        </div>
                    @endif
                @endauth
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" @cannot('purchase', $note) disabled @endcannot type="submit">
                    @guest
                        @lang('note.purchasing.guest')
                    @endguest
                    @auth()
                        @can('purchase', $note)
                            @lang('note.purchasing.confirm')
                        @endcan
                        @cannot('purchase', $note)@lang('note.purchasing.processing')@endcannot
                    @endauth
                </button>
                @guest()
                    <a href="{{ route('login') }}">登录</a>
                    <a href="{{ route('register') }}">注册</a>
                @endguest
            </div>
        </form>
    </div>
</div>

{{--TODO: Implement Contact Edit Redirect--}}