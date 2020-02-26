<nav aria-label="Page navigation example" class="d-flex">
    @if($items->currentPage() != 1)
    <ul class="pagination mr-3">
        <li class="page-item">
            <a class="page-link" href="{{ $items->url(1) }}">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
    </ul>
    @endif

    <ul class="pagination">
        @if ($items->currentPage() != 1)
        <li class="page-item">
            <a class="page-link" href="{{ $items->previousPageUrl() }}">Previous</a>
        </li>
        @endif
        
        @foreach ($items->getUrlRange(max($items->currentPage() - 2, 1), min($items->currentPage() + 2, $items->lastPage())) as $num => $link)
        <li class="page-item">
            <a class="page-link" href="{{ $link }}">{{$num}}</a>
        </li>
        @endforeach
        
        @if($items->hasMorePages())
        <li class="page-item">
            <a class="page-link" href="{{ $items->nextPageUrl() }}">Next</a>
        </li>
        @endif
    </ul>
    
    @if($items->currentPage() != $items->lastPage())
    <ul class="pagination ml-3">
        <li class="page-item">
            <a class="page-link" href="{{ $items->url($items->lastPage()) }}">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
    @endif
</nav>