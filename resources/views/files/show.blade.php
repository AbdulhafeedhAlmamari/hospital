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
                <li class="breadcrumb-item"><a href="{{ url()->previous() }}">{{ $file_title }}</a></li>
                <li class="breadcrumb-item active">{{ $file->title }}</li>
            </ul>

            @if ($file->files->isNotEmpty())
                <ul class="list-group">
                    @foreach ($file->files as $file)
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
