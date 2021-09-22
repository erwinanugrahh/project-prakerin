<div>
    <style>
        .page-item.active .page-link{
            background-color: #ffb600;
            border-color: transparent;
        }
    </style>
    @if ($paginator->hasPages())
        <nav class="paging" aria-label="Page Navigation Blog">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <a class="page-link" aria-hidden="true"><i class="fas fa-angle-double-left"></i></a>
                    </li>
                @else
                    <li class="page-item">
                        <a type="button" dusk="previousPage" class="page-link" wire:click="previousPage" wire:loading.attr="disabled" rel="prev"><i class="fas fa-angle-double-left"></i></a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="page-item disabled" aria-disabled="true"><a class="page-link">{{ $element }}</a></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active" wire:key="paginator-page-{{ $page }}" aria-current="page"><a class="page-link">{{ $page }}</a></li>
                            @else
                                <li class="page-item" wire:key="paginator-page-{{ $page }}"><a type="button" class="page-link" wire:click="gotoPage({{ $page }})">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a type="button" dusk="nextPage" class="page-link" wire:click="nextPage" wire:loading.attr="disabled" rel="next"><i class="fas fa-angle-double-right"></i></a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link" aria-hidden="true"><i class="fas fa-angle-double-right"></i></span>
                    </li>
                @endif
            </ul>
        </nav>
    @endif
</div>
