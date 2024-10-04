@extends('layouts.main')

@section('cssStyle')
    <style>

    </style>
@endsection
@section('content')

    {{-- mack grid contain cardes in row and col card contain image and title --}}
    {{-- <div class="container"> --}}
    <div class="row">
        @foreach ($posts as $post)
        <div class="col-3 mb-3">
            <a href="{{route('file.show', $post)}}" class="text-decoration-none text-dark">
                <div class="card shadow">
                    <img src="{{ $post->image_path }}" class="card-img-top" alt="image">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $post->title }}</h5>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    {{-- </div> --}}
@endsection

@section('script')
@endsection
