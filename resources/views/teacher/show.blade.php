@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="rounded box-shadow bg-white">
            <h1>导师介绍</h1>
            {{ $teacher->name }}
        </div>
    </div>
@endsection
