@if ($paginator->hasPages())
    
  {{-- Previous Page Link --}}
  @if ($paginator->onFirstPage())
    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
      <a href="" class="page-link">
        <i class="far fa-long-arrow-left"></i>
      </a>
    </li>
  @else
    <li class="page-item">
      <a class="page-link" href="{{ $paginator->previousPageUrl() }}{{ request('category_id') ? '&category_id='. request('category_id') : '' }}" rel="prev" aria-label="@lang('pagination.previous')">
        <i class="far fa-long-arrow-left"></i>
      </a>
    </li>
  @endif

  {{-- Pagination Elements --}}
  @foreach ($elements as $element)
    {{-- "Three Dots" Separator --}}
    @if (is_string($element))
      <li class="page-item disabled" aria-disabled="true"><span>{{ $element }}</span></li>
    @endif

    {{-- Array Of Links --}}
    @if (is_array($element))
      @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
          <li class="page-item active" aria-current="page">
            <a class="page-link" href="{{ $url }}{{ request('category_id') ? '&category_id='. request('category_id') : '' }}">{{ $page }}</a>
          </li>
        @else
          <li class="page-item">
            <a class="page-link" href="{{ $url }}{{ request('category_id') ? '&category_id='. request('category_id') : '' }}">{{ $page }}</a>
          </li>
        @endif
      @endforeach
    @endif
  @endforeach

  {{-- Next Page Link --}}
  @if ($paginator->hasMorePages())
    <li class="page-item">
      <a class="page-link" href="{{ $paginator->nextPageUrl() }}{{ request('category_id') ? '&category_id='. request('category_id') : '' }}" rel="next" aria-label="@lang('pagination.next')">
        <i class="far fa-long-arrow-right"></i></a>
      </a>
    </li>
  @else
    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
      <a href="" class="page-link">
        <i class="far fa-long-arrow-right"></i></a>
      </a>
    </li>
  @endif
       
@endif
