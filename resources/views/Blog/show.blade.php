@extends('layouts.helper')

@section('content')

    <div class="container text-white mb-5" style="background-color: rgba(0,0,0,0.5)">
        <h1>{{$data->title}}</h1>
        <h6 class="card-subtitle mt-3 mb-3 text-secondary">{{ $data->author }} || {{ $data->datetime }}</h6>
        <p class="text-justify">{!! $data->content !!}</p>
        <br>
    </div>

@endsection
