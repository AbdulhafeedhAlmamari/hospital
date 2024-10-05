@extends('layouts.main')

@section('cssStyle')
    <style>

    </style>
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        {{-- button --}}
        <div class="d-flex justify-content-right my-5">
            <a href="{{ route('ovr.create') }}" class="btn btn-primary">{{ __('OVR') }}</a>
        </div>
    </div>
</div>

    <div class="row">
        @foreach ($posts as $post)
            <div class="col-3 mb-3">
                <a href="{{ route('posts.show', $post) }}" class="text-decoration-none text-dark">
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


@endsection
