@extends('layouts.app')

@section('content')

    @include('components.alert')
    <div id="subscription" class="container">
        <div class="jumbotron bg-white box-shadow">
            <h1 class="display-4">订单处理</h1>
            <p class="lead">
                {{ $item->name }}
                <span class="badge badge-info">价格￥{{ $item->currentPrice }}</span>
            </p>
            <p class="lead mb-1">用户名：<strong>{{ $user->name }}</strong></p>
            <p class="lead mb-1">QQ号：{{ $user->qq }}</p>
            <p class="lead mb-1">手机号：{{ $user->mobile }}</p>
            <p class="lead mb-1">地址：{{ $user->address }}</p>
            <p class="lead mb-1">真实姓名：{{ $user->real_name }}</p>
            <hr class="my-4">
            <p>
                @if($subscription->paid)
                    该订单已经处理完成。
                @else
                    如收到款项，请点击确认；如用户放弃购买，请点击取消。
                @endif
            </p>
            <p class="lead">
                @if(!$subscription->paid)
                    <a class="btn btn-success" href="{{ route('subscription.confirm', $subscription->id) }}" role="button">确认</a>
                    <a class="btn btn-danger" href="{{ route('subscription.abandon', $subscription->id) }}" role="button">取消</a>
                @endif
            </p>
        </div>
    </div>

@endsection
