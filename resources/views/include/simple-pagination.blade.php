@if ($paginator->lastPage() > 1)
    <p class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
        <a href="{{ $paginator->url($paginator->currentPage()-1) }}"> <<< </a>
    </p>
    <p class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
        <a href="{{ $paginator->url($paginator->currentPage()+1) }}" > >>> </a>
    </p>
@endif
