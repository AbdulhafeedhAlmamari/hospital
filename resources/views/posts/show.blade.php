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
        <div class="col">

            <ul class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                {{-- <li class="breadcrumb-item"><a href="#">Library</a></li> --}}
                <li class="breadcrumb-item active">{{ $post_title }}</li>
            </ul>

            @if ($post->isNotEmpty())
                <ul class="list-group">
                    @foreach ($post as $file)
                        <li class="list-group-item">
                            <a href="{{ route('files.show', $file) }}">
                                {{ $file->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection

@section('script')
@endsection
