<nav aria-label="Page navigation">
    <ul class="pagination">
        @if ($paginator->onFirstPage())
            <li class="page-item first disabled">
                <a class="page-link" href="#" aria-label="First">
                    <i class="bx bx-chevrons-left"></i>
                </a>
            </li>
            <li class="page-item prev disabled">
                <a class="page-link" href="#" aria-label="Previous">
                    <i class="bx bx-chevron-left"></i>
                </a>
            </li>
        @else
            <li class="page-item first">
                <a class="page-link" href="{{ $paginator->url(1) }}" aria-label="First">
                    <i class="bx bx-chevrons-left"></i>
                </a>
            </li>
            <li class="page-item prev">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                    <i class="bx bx-chevron-left"></i>
                </a>
            </li>
        @endif

        {{-- Loop through the pages --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li class="page-item next">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                    <i class="bx bx-chevron-right"></i>
                </a>
            </li>
            <li class="page-item last">
                <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}" aria-label="Last">
                    <i class="bx bx-chevrons-right"></i>
                </a>
            </li>
        @else
            <li class="page-item next disabled">
                <a class="page-link" href="#" aria-label="Next">
                    <i class="bx bx-chevron-right"></i>
                </a>
            </li>
            <li class="page-item last disabled">
                <a class="page-link" href="#" aria-label="Last">
                    <i class="bx bx-chevrons-right"></i>
                </a>
            </li>
        @endif
    </ul>
</nav>
