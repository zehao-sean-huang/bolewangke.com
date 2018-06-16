@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="rounded box-shadow bg-white p-3">
            <h1>全部入驻导师</h1>
            @foreach($teachers as $teacher)
                ...
            @endforeach
        </div>
    </div>

@endsection
