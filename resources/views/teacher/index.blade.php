@extends('layouts.app')

@section('content')

    @include('components.alert')

    <div class="container" id="teachers">
        <div class="my-3 p-3 bg-white rounded box-shadow">
            <h5 class="border-bottom border-gray pb-2 mb-0">全部导师</h5>
            <div class="row">
                @foreach($teachers as $teacher)
                    @include('components.teacher', ['teacher' => $teacher])
                @endforeach
            </div>
        </div>
    </div>

@endsection
