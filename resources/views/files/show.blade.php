@extends('layouts.main')

@section('cssStyle')
    <style>

    </style>
@endsection
@section('content')
    {{-- mack grid contain cardes in row and col card contain image and title --}}
    <div class="row">
        <div class="col">

            @foreach ($file as $subFile)
                @if (!$subFile->files()->exists())
                    <li class="list-group-item">
                        <a href="{{ route('subtitles.detail', $subFile) }}">
                            {{ $subFile->title }}
                        </a>
                    </li>
                @else
                    @foreach ($file as $subFile)
                        <li class="list-group-item">
                            <a href="{{ route('subtitles.detail', $subFile) }}">
                                {{ $subFile->title }}
                            </a>
                        </li>
                    @endforeach
                @endif
            @endforeach



        </div>
    </div>
@endsection

@section('script')
@endsection
