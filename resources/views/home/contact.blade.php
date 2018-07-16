@extends('layouts.app')

@section('content')

    <div id="title" class="container">
        <h3>
            编辑联系方式
            <small class="text-muted">购买笔记用</small>
        </h3>
    </div>
    <div id="form" class="container">
        <form action="{{ route('home.contact.update') }}" method="POST">
            @method('PUT')
            @csrf
            <div id="ordered" class="rounded box-shadow bg-white p-3 mb-4">
                <h5 class="border-bottom border-gray pb-2 mb-2">编辑信息</h5>
                @include('components.alert')
                <div class="form-group row">
                    <label for="mobile" class="col-sm-4 col-form-label text-md-right">手机号</label>
                    <div class="col-md-6">
                        <input id="mobile" type="tel" class="form-control" name="mobile" value="{{ Auth::user()->mobile }}" required autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="qq" class="col-sm-4 col-form-label text-md-right">QQ号</label>
                    <div class="col-md-6">
                        <input id="qq" type="tel" class="form-control" name="qq" value="{{ Auth::user()->qq }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-sm-4 col-form-label text-md-right">地址</label>
                    <div class="col-md-6">
                        <input id="address" type="text" class="form-control" name="address" value="{{ Auth::user()->address }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="real_name" class="col-sm-4 col-form-label text-md-right">真实姓名</label>
                    <div class="col-md-6">
                        <input id="real_name" type="text" class="form-control" name="real_name" value="{{ Auth::user()->real_name }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="submit" class="col-sm-4 col-form-label text-md-right"></label>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">提交</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection