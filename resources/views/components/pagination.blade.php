@if ($paginator->hasPages())
    <nav class="pagination">
        <ul>
            @if ($paginator->onFirstPage())
                <li><span class="page-link disabled">Sebelumnya</span></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" class="page-link" rel="prev">Sebelumnya</a></li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li><span class="page-link disabled">{{ $element }}</span></li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><span class="page-link active">{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" class="page-link" rel="next">Berikutnya</a></li>
            @else
                <li><span class="page-link disabled">Berikutnya</span></li>
            @endif
        </ul>
    </nav>
@endif
