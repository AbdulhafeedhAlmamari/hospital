<ul class="list-group">
    @foreach ($subFiles as $subFile)
        <li class="list-group-item">
            <a href="{{ route('subtitles.detail', $subFile) }}">
                {{ $subFile->title }}
            </a>
            @if ($subFile->files->isNotEmpty())
                @include('includes.sub_files', ['subFiles' => $subFile->files])
            @endif
        </li>
    @endforeach
</ul>
